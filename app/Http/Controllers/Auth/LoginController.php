<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle the redirection after login based on user roles.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            // Redirect admin users to admin dashboard
            return redirect('/admin/dashboard');
        }

        // Redirect regular users to home
        return redirect('/');
    }

    public function showLoginForm()
    {
        $categories = Category::parentCategories()
        ->orderBy('name', 'asc')
        ->get();

        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('frontend.auth.login', compact('categories'));
    }
}
