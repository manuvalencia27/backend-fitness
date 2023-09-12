<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;
use App\Models\User;
use App\Models\Product;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderByDesc('id')->get();

        return view('admin.comments.index', [
            'comments' => $comments,
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $users = User::all();
        $products = Product::all();

        return view('admin.comments.create',[
            'comment' => $comment, 'users' => $users, 'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'comment' => 'required',
            'user_id' =>'required',
            'product_id' => 'required'
        ]);

        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->product_id = $request->product_id;
        $comment->save();

        return Redirect::action([CommentController::class, 'index'])->with([
            'success' => 'El comentario ha sido editado',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return Redirect::action([CommentController::class, 'index'])->with([
            'success' => 'El comentario ha sido eliminado',
        ]);
    }
}
