<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token = null)
    {
        $categories = Category::all();

        if (is_null($token)) {
            return $this->getEmail();
        }

        // Add email and token to the data
        $this->data['email'] = $request->input('email');
        $this->data['token'] = $token;
        $this->data['categories'] = $categories;

        // Return the view with data
        return view('frontend.auth.password.reset', $this->data);
    }

    public function toMail($notifiable)
    {
        $url = route('password.reset', ['token' => $this->token]);

        return (new MailMessage)
                    ->subject('Reset Your Password')
                    ->line('Click the button below to reset your password.')
                    ->action('Reset Password', $url);
    }
}
