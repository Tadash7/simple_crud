<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserForm;
use App\Models\User;
use Error;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')
            ->paginate(
                15, ['users.id', 'users.name', 'users.email']
            );

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->edit(new User());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserForm $request)
    {
        return $this->update($request, new User());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserForm $request, User $user)
    {
        $request->persist($user);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->destroy($user->id);
        return redirect(route('users.index'));
    }
}
