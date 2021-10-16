<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        $data = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($data)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back');
        }

        throw ValidationException::withMessages([
            'email' => 'Invalid credentials'
        ]);
    }

    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye');
    }
}
