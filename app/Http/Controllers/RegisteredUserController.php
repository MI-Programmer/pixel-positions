<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required", "confirmed", Password::min(6)],
        ]);
        $request->validate([
            "employer" => ["required"],
            "logo" => ["required", File::types(["png", "jpg", "jpeg", "webp"])],
        ]);

        $logoPath = $request->logo->store("logos");
        $user = User::create($userAttributes);
        $user->employer()->create(["name" => request("employer"), "logo" => $logoPath]);

        Auth::login($user);

        return redirect("/");
    }
}
