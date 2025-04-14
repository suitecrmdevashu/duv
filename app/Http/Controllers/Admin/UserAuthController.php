<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Config;
use DB;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Validator;

class UserAuthController extends Controller
{
	// Show login view
    public function login_view(Request $request)
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('admin.auth');
        }
    }
    /**
     * [login description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request)
    {
        try {
            $request_input = $request->except('_token');

            $rules = [
                'email' => ['required', 'regex:/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', 'exists:users'],
                'password' => 'required',
            ];

            $messages = [
                'email.required' => 'Please enter your email',
                'email.regex' => 'Please enter valid email',
                'email.exists' => 'Entered email address doesn\'t match our records',
                'password.required' => 'Please enter your password',
            ];

            $validator = Validator::make($request_input, $rules, $messages);

            if ($validator->fails()) {
                $response['msg'] = $validator->errors()->toArray();
                $response['result'] = 'error';
            } else {
                $user = User::where('email', '=', $request_input['email'])
                    ->first();

                if (!is_null($user)) {
                    if (Hash::check($request_input['password'], $user['password'])) {
                    	Auth::login($user, isset($request_input['remember']));
                    	Auth::logoutOtherDevices($request_input['password']);
                        // Auth::logoutOtherDevices($request_input['password']);
                        $response['result'] = 'success';
                        $response['msg'] = 'Login successful';
                        $response['admin'] = $user->isA('Admin');
                        $response['manager'] = $user->isA('Manager');
                    } else {
                        $response['result'] = 'error';
                        $response['msg'] = ['password' => ['Wrong password. Please try again.']];
                    }
                } else {
                    $response['result'] = 'error';
                    $response['msg'] = ['email' => ['Entered email address doesn\'t match our records.']];
                }
            }
        } catch (Exception $e) {
            app(\App\Exceptions\Handler::class)->report($e);
            $response['result'] = 'failure';
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }
    /**
     * [logout description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect('/admin/auth');
    }


    ////// Forgot Password

    public function showForgotForm(){
        return view('admin/forgot');
    }
    public function sendResetLink(Request $request ){
     $request->validate([
       'email'=>'required|email|exists:users,email'
     ]);

     $token = \Str::random(64);
     \DB::table('password_resets')->insert([
        'email'=>$request->email,
        'token'=>$token,
        'created_at'=>Carbon::now(),
     ]);
        
       $action_link=route('reset.password.form',['token'=>$token,'email'=>$request->email]);
       $body ="We are received a request to reset the password for <b> Scada Management System </b> account associated with " .$request->email. " . You can reset your password by clicking the link below";

       \Mail::send('admin/email-forgot',['action_link'=>$action_link,'body'=>$body],function($message) use($request){
        $message->from('project.test8112@gmail.com','Scada Management System');
        $message->to($request->email,'Your Name')
        ->subject('Reset Password');
       });

      return back()->with('success','We have e-mailed your password reset link!');
    }
 public function showresetForm(Request $request, $token=null){
  return view('admin.resetpass')->with(['token'=>$token,'email'=>$request->email]);
 }

 public function resetPassword(Request $request){
    $request->validate([
        'email'=>'required|email|exists:users,email',
        'password'=>'required|min:8|max:15|confirmed',
        'password_confirmation'=>'required',
      ]);

      $check_token = \DB::table('password_resets')->where([
        'email'=>$request->email,
        'token'=>$request->token,
      ])->first();

      if(!$check_token){
        return back()->withInput()->with('fail','Invalid token');

      }else{
          User::where('email',$request->email)->update([
            'password'=>\Hash::make($request->password)
          ]);

          \DB::table('password_resets')->where([
            'email'=>$request->email
          ])->delete();

          return redirect()->route('login')->with('success','Your password has been changed! You can login with new password')->with('varifiedEmail',$request->email);
      }
   }
}