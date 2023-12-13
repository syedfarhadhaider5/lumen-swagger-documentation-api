<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

/**
 * @OA\Post(
 *     path="/get-token",
 *     summary="User login",
 *     description="Logs a user into the system and returns an access token",
 *     tags={"Get Token"},
 *     operationId="login",
 *     @OA\RequestBody(
 *         required=true,
 *         description="User credentials",
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="secret"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Login successful"),
 *             @OA\Property(property="token", type="string", example="your_access_token_here"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Invalid credentials",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Invalid credentials"),
 *         ),
 *     ),
 * )
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\JsonResponse
 */
class UserController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password_hash)) {
            if ($user->hasRole('AC_ADMIN')) {
                return response()->json(['message' => 'Login successful', 'token' => $user->access_token]);
            } else if ($user->hasRole('DEALERSHIP_ADMIN')) {
                return response()->json(['message' => 'Login successful', 'token' => $user->access_token]);
            } else {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
