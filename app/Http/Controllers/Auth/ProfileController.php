<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ProfileController extends Controller
{
    public function index()
	{
		$user = auth()->user();

        $provinces = $this->getProvinces();
        $cities = isset($user->province_id) ? $this->getCities($user->province_id) : [];

        $categories = Category::parentCategories()
        ->orderBy('name', 'asc')
        ->get();;

        return view('frontend.auth.profile', compact('user','provinces','cities', 'categories'));
    }

    public function update(Request $request)
	{
		$params = $request->except('_token');

		$user = auth()->user();

		if ($user->update($params)) {
			return redirect('profile');
		}
	}
}
