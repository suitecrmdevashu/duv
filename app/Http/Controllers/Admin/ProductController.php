<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Validator;
use Str;
use File;
use Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('active', 'product');

            return $next($request);
        });
    }
    public function index()
    {
        $data = [
            'products' => Product::all()->sortByDesc('id'),
            'title' => 'Products'
        ];

        return view('admin.product.index', $data);
    }

    public function create_product()
    {
        return view('admin.product.create', ['title' => 'Add Product']);
    }

    public function check_product(Request $request)
    {
        $name = Product::where('title', $request->title)->exists();
        if ($name) {
            return response()->json(['status' => 'success', 'messages' => 'not available', 'code' => 200], 200);
        } else {
            return response()->json(['status' => 'success', 'messages' => 'available', 'code' => 201], 201);
        }
    }

    public function save_product(Request $request)
    {
        $validator = Validator($request->all(), [
            'category' => 'required',
            'title' => 'required|unique:products',
            // 'price' => 'required|integer',
            // 'stock' => 'required|integer',
            // 'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('productCreate')->withErrors($validator)->withInput();
        } else {
            Product::create([
                'category_id' => $request->category,
                'title' => $request->title,
                // 'price' => $request->price,
                // 'stock' => $request->stock,
                // 'desc' => $request->desc,
            ]);

            return redirect()->route('productAddImages', ['product' => $request->title]);
        }
    }

    public function addImages_product($product)
    {
        $productData = Product::where('title', $product)->first();

        $data = [
            'title' => 'Add Images - ' . str_replace('-', ' ', $product),
            'product' => $productData
        ];

        return view('admin.product.addImages', $data);
    }


    public function getImages_product(Request $request)
    {
        $data = ProductImage::where('product_id', $request->id_products)->orderByDesc('id')->get();
        return response()->json($data);
    }

    public function addImagesSave_product(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('shop/products'), $imageName);

        ProductImage::create([
            'product_id' => $request->id_product,
            'path' => $imageName
        ]);

        return response()->json(['status' => 'success', 'code' => 200], 200);
    }

    public function deleteImages_product(Request $request)
    {
        $filePath = public_path('shop/products/' . $request->filename);
        if (file_exists($filePath)) {
            unlink($filePath);
            ProductImage::where('path', $request->filename)->delete();
            return response()->json(['status' => 'success', 'code' => 200], 200);
        }
        return response()->json(['status' => 'error', 'code' => 404], 404);
    }

    public function edit_product($product)
    {
        $productData = Product::where('title', $product)->first();

        $data = [
            'product' => $productData,
            // 'title' => 'Edit product '. str_replace('-', ' ', $product)
        ];


        return view('admin.product.edit', $data);
    }

    public function editSave_product(Request $request, $product, $id)
    {

        $validatorCheck = '';
        if ($product != $request->title) {
            $validatorCheck = 'unique:products';
        }

        $validator = Validator($request->all(), [
            'category' => 'required',
            'title' => 'required|' . $validatorCheck,
            // 'price' => 'required|integer',
            // 'stock' => 'required|integer',
            // 'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('productEdit', ['product' => $product, 'id' => $id])->withErrors($validator)->withInput();
        } else {
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'title' => $request->title,
                // 'price' => $request->price,
                // 'stock' => $request->stock,
                // 'desc' => $request->desc,
            ]);

            return redirect()->route('productEdit', $request->title)->with('success', 'Data updated');
        }
    }

    public function delete_product($id)
    {
        $product = Product::where('id', $id)->first();

        $dataImage = [];

        foreach ($product->productImage as $i => $item) {
            array_push($dataImage, public_path() . '/shop/products/' . $item->path);
        }

        // Loop through each file path and check if the file exists before attempting to delete
        foreach ($dataImage as $path) {
            if (file_exists($path)) {
                unlink($path);
            }
        }

        Product::destroy($id);
        return redirect()->route('products')->with('success', 'Data product deleted');
    }
}
