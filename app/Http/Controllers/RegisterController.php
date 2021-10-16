<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create () {
        return view('register.create');
    }

    public function store () {
        $data = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', 'unique:users,username'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:7'],
        ]);

        $user = User::create($data);

        auth()->login($user);

        return redirect('/')->with('success', 'You have successfully registered'); // With -> Flash data to session
    }
}
