<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        $products = Product::active()->get();
        $slides = Slide::active()->orderBy('position', 'ASC')->get();;

        $categories = Category::parentCategories()
			->orderBy('name', 'asc')
            ->get();

        return view('frontend.homepage', compact('products', 'slides', 'categories'));
    }
}
