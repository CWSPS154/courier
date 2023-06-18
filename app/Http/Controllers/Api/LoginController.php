<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->guard()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|Response
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse|Response
    {
        $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $this->guard()->user()->tokens()->delete();
            $token = $this->guard()->user()->createToken('access-token')->plainTextToken;
            return response()->json(['access-token' => $token], 200);
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
}
