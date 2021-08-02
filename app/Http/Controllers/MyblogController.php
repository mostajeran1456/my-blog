<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MyblogController extends Controller
{
//    public function index(Request $request)
//    {
//        $user=User::findOrFail($request->input("id"));
//        return view("second",compact("user"));
//    }

    public function index(Request $request, User $user)
    {
        return view("second", compact("user"));
    }
}
