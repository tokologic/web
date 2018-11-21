<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = \Sentinel::authenticate([
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        ]);

        if (!$user) {
            return redirect('/login')->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'message' => 'Combination of email and password not found.'
                ]);
        }

        $authenticated = \Sentinel::login($user);

        if ($authenticated)
            return redirect()->to('/dashboard');
    }

    public function logout()
    {
        \Sentinel::logout();

        return redirect()->to('/login');
    }
}
