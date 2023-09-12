<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * se toman solo 3 ya que son los 3 tags que tienen productos
     */
    public function create()
    {
        $tags = Tag::take(3)->get();

        return view('admin.categories.create', [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * validaciones para crear la cateogría
     * se recibe imagen de categoría
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' =>'required|unique:categories',
            'image' => 'mimes:jpg',
            'tag_id' => 'nullable'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->tag_id = $request->tag_id;
        
        //si viene el archivo agregarlo al servidor y agregar nombre
        if ($request->hasFile('image')) {
            
            $image = $request->file("image");
            $nombreImagen = Str::slug($request->slug,'-');
            $ruta = public_path("/assets/imgs/shop/");

            copy($image->getRealPath(), $ruta.$nombreImagen.".jpg");
            $category->image = $nombreImagen;
        }else{
            //si no, se pasa un nombre genérico
            $category->image = 'category-thumb-1';
        }
        $category->save();

        return Redirect::action([CategoryController::class, 'index'])->with([
            'success' => 'La categoria ha sido creada',
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
    public function edit(Category $category)
    {
        $tags = Tag::take(3)->get();

        return view('admin.categories.create',[
            'category' => $category, 'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' =>'required|unique:categories',
            'image' => 'nullable|mimes:jpg',
            'tag_id' => 'nullable'
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->tag_id = $request->tag_id;
        
        if ($request->hasFile('image')) {
            
            $image = $request->file("image");
            $nombreImagen = Str::slug($request->slug,'-');
            $ruta = public_path("/assets/imgs/shop/");

            copy($image->getRealPath(), $ruta.$nombreImagen.".jpg");
            $category->image = $nombreImagen;
        }

        $category->save();

        return Redirect::action([CategoryController::class, 'index'])->with([
            'success' => 'La categoría ha sido editada',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::action([CategoryController::class, 'index'])->with([
            'success' => 'La categoría ha sido eliminada',
        ]);

    }
}
