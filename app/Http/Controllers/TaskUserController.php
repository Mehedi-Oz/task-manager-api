<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class TaskUserController extends Controller
{
    public function handleLogin()
    {
        return view('task-user.login');
    }

    public function handleRegister()
    {
        return view('task-user.register');
    }

    public function store(UserRequest $request)
    {
        try {
            // dd($request->all());
            $data = $request->validated();

            $data['password'] = Hash::make($data['password']);
            TaskUser::create($data);

            return redirect('/');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['message' => 'User already exists']);
        }
    }

    public function verify(LoginRequest $request)
    {
        try {
            $data = $request->validated();
            $user = TaskUser::where('email', $data['email'])->first();

            //check if user exits and password matches
            if ($user && Hash::check($data['password'], $user->password)) {
                return redirect('/');
            }

            // If login fails, redirect back with an error message
            return redirect()->back()->withErrors(['message' => 'Invalid email or password.']);
        } catch (\Exception $e) {
            // Redirect back with a generic error message
            return redirect()->back()->withErrors(['message' => 'Please try again.']);
        }
    }
}
