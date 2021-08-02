<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $users = User::where([
            ["name", "like", "%{$request->input('name')}%"],
            ["email", "like", "%{$request->input('mail')}%"]
        ])->orderBy("id", "DESC")->get();
        return view("user.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        return \view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            "name" => ["required"],
            "password" => ["required", "min:5"],
            "email" => ["required", "email"],
        ]);

        User::create($valid);

        return redirect(route("user.index"))->with("msg", "user created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view("user.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, User $user)
    {
        $valid = $request->validate([
            "name" => ["required"],
            "password" => ["required", "min:5"],
            "email" => ["required", "email"],
        ]);

        $user->update($valid);
        return redirect(route("user.index"))->with("msg", "user updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route("user.index"))->with("msg", "user deleted successfully");
    }
}
