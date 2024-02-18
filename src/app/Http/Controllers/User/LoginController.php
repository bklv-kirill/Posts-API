<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $userData = $request->validated();

        $user = User::query()->where("email", $userData["email"])->first();

        return Hash::check($userData["password"], $user->password) ? new UserResource($user) : response(["status" => false, "error" => "Invalid password"], 401);
    }
}
