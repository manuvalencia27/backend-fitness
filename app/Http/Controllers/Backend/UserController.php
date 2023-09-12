<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $users = User::paginate(10); */
        $users = User::orderByDesc('id')->get();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->password = Hash::make($request->password);
        $user->save();

        return Redirect::action([UserController::class, 'index'])->with([
            'success' => 'El usuario ha sido creado',
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
    public function edit(User $user)
    {
        return view('admin.users.create',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return Redirect::action([UserController::class, 'index'])->with([
            'success' => 'El usuario ha sido editado',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::action([UserController::class, 'index'])->with([
            'success' => 'El usuario ha sido eliminado',
        ]);

    }
}
