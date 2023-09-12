<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Product;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->get();

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderByDesc('id')->get();
        $tags = Tag::take(3)->get();

        return view('admin.products.create', [
            'tags' => $tags, 'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $product = new Product();
        $product->fill($request->validated());
        if ($request->hasFile('image')) {
            
            $image = $request->file("image");
            $nombreImagen = Str::slug($request->slug,'-');
            $ruta = public_path("/assets/imgs/shop/");

            copy($image->getRealPath(), $ruta.$nombreImagen.".png");
            $product->image = $nombreImagen;
        }else{
            $product->image = 'product-1';
        }
        $product->save();


        return Redirect::action([ProductController::class, 'index'])->with([
            'success' => 'El producto ha sido creado',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $tags = Tag::take(3)->get();
        $categories = Category::orderByDesc('id')->get();

        return view('admin.products.create',[
            'product' => $product, 'tags' => $tags, 'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductEditRequest $request, Product $product)
    {
        $product->fill($request->validated());
        if ($request->hasFile('image')) {
            
            $image = $request->file("image");
            $nombreImagen = Str::slug($request->slug,'-');
            $ruta = public_path("/assets/imgs/shop/");

            copy($image->getRealPath(), $ruta.$nombreImagen.".png");
            $product->image = $nombreImagen;
        }
        $product->save();


        return Redirect::action([ProductController::class, 'index'])->with([
            'success' => 'El producto ha sido editado',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::action([ProductController::class, 'index'])->with([
            'success' => 'El producto ha sido eliminado',
        ]);
    }
}
