<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //===================================================================
    public function __construct()
    {
        $this->middleware('auth');
    }

    //===================================================================
    public function index()
    {
        if(Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.users.index');
        }
        else
            return redirect()->route('user.index');

    }
}
