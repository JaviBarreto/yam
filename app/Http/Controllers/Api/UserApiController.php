<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserApiController extends Controller
{

    public function Signup(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users|email',
            'phone_number' => 'required',
        ]);

        $request->request->add(['role_id' => 2]);
        $request->request->add(['password' => Hash::make('password')]);

        $input = $request->all();

        $user = User::create($input);

        return response()->json(['Message' => 'Successful registration', "Status" => 200]);
    }

    public function Signin(UserLoginRequest $request)
    {

        $user = User::wherePhoneNumber($request->phone_number)->first();

        if (!is_null($user)) {

            $token = $user->createToken('Laravel')->accessToken;

            $user->save();

            return response()->json(['Message' => 'Welcome!', 'token' => $token, 'token_type' => 'Bearer'], 200);

        } else {
            return response()->json(['Message' => 'Wrong phone number'], 200);
        }
    }

    public function Signout()
    {
        $user = auth()->user();

        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });

        $user->save();

        return response()->json(['Message' => 'Successful Logout', "Status" => 200]);
    }

    public function CompleteProfile(Request $request, User $user)
    {
        $user = Auth::user();

        if ($request->hasFile('profileimage')) {

            Storage::delete($user->profileimage);

            $user->profileimage = $request->profileimage->store('img_profile', 'public');
        }

        $user->username = $request->username;
        $user->dninumber = $request->dninumber;

        $user->save();

        return response()->json(['Message' => 'Successful registration', "Status" => 200]);
    }

    public function GetProfile()
    {

        $id = Auth::user()->id;

        $user = User::with('address')->find($id);

        $user = new UserResource($user);

        return response()->json([
            'Message' => 'Message here...',
            "Status" => 200,
            'Profile' => $user,
        ]);

    }

}
