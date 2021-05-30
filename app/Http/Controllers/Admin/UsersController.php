<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //=================================================================================================
    public function index(Request $request)
    {
        if(!is_null($request->search))
            $users = User::where('name', 'like', '%' . $request->search . '%')->orwhere('email', 'like', '%' . $request->search . '%')->paginate(5);
        else
            $users = User::paginate(5);

        return view('admin.users.index')->with('users', $users);
    }


    //=================================================================================================
    public function edit(User $user)
    {
        if (Gate::denies('edit-users')){
            return redirect()->route('admin.users.index');
        }

        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    //=================================================================================================

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')
            ->with('success', 'Roles atualizadas com sucesso');
    }

    //=================================================================================================

    public function destroy(User $user)
    {
        if (Gate::denies('delete-users')){
            return redirect()->route('admin.users.index');
        }
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User eliminado com sucesso');
    }
}
