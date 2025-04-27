<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.*', function ($view) { // 👉 Only for frontend views
            $menus = Menu::whereNull('parent_id')
                ->where('is_active', 1)
                ->with(['submenus' => function ($query) {
                    $query->where('is_active', 1);
                }])
                ->orderBy('order', 'asc')
                ->get();
        
            $view->with('menus', $menus);
        });
    }
}
