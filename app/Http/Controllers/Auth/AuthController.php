<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\Imei;
use App\Models\User;
use App\Services\Imei\ImeiCreator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    use ApiResponser;
    //
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::check()) {
            if (Auth::user()->mainRole()->name === 'admin') {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors([
                    'active' => 'You must be an active user'
                ]);
            }
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function changePassword(Request $request)
    {
        try {

            $id = Auth::user()->id;
            // Find the user by email
            $user = User::where('id', $id)->first();

            // If user not found, return an error response
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }
            if (Hash::check($request->password, $user->password)) {
                $user->update([
                    'password' => bcrypt($request->new_password)
                ]);
                // JWTAuth::invalidate(JWTAuth::getToken());
                return response()->json(['message' => 'Password reset successful']);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Old Password donot Match'
            ], 404);
        } catch (\Exception $e) {
            // Handle any errors that occurred during token refresh
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to refresh token'
            ], 500);
        }
    }
}
