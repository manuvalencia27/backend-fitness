<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     * Devuelve el home del admin
     */
    public function index()
    {
        return view('admin.index');
    }
}
