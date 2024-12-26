<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AboutUsController extends Controller
{
    /**
     * Display the About Us page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::parentCategories()
        ->orderBy('name', 'asc')
        ->get();

        return view('frontend.about_us.index', compact('categories'));
    }
}
