<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use App\Traits\ControllerResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ControllerResponse;
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function create()
    {
        $roles = $this->authService->getRoles();
        dd($roles);
        return view('pages/auth/register', compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrationRequest $request)
    {
        try {
            $response = $this->authService->create($request->validated());
            Auth::login($response);
            return redirect()->route('verification.notice')->with('status', 'verification-link-sent');;
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to create account', $th->getMessage(), 500);
        }
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
