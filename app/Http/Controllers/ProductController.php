<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::limit(3)->with('products')->get();
        $categories = Category::all();
        $products = Product::all();
        
        return view('welcome', [ 'products' => $products, 'categories' => $categories, 'tags' => $tags ]);
    }

    public function shop()
    {
        $tags = Tag::limit(3)->get();
        $categories = Category::with('products')->get();
        $products = Product::paginate(10);

        return view('products.list', [ 'products' => $products, 'categories' => $categories, 'tags' => $tags ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)
            ->with('tag')
            ->with('category')
            ->get();

        return view('products.category', [
            'products' => $products
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $categories = Category::with('products')->get();
        return view('products.detail', [
            'product' => $product, 'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
