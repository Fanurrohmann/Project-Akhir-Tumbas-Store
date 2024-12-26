<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::parentCategories()
        ->orderBy('name', 'asc')
        ->get();

        return view('frontend.contact.index', compact('categories'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:5000',
        ]);

        // Kirim email
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'messageBody' => $request->message,
        ];

        Mail::send('frontend.contact.email', $data, function ($message) use ($data) {
            $message->to('alfarohman160@gmail.com', 'Admin')
                    ->subject('Pesan dari ' . $data['name']);
            $message->from($data['email'], $data['name']);
        });

        return redirect()->route('contact.index')->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
