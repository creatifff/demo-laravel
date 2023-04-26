<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()->create($validated);

        auth()->login($user);

        return redirect()->route('page.home');
    }

    public function loginUser(LoginRequest $request)
    {
        $validated = $request->validated();
        if(auth()->attempt($validated)) {
            return redirect()->route('page.home');
        }

        return back()->withErrors(['invalid' => 'Неверный логин или пароль']);
    }

    public function logoutUser(LoginRequest $request)
    {
        auth()->logout();
        return redirect()->route('page.home');
    }
}
