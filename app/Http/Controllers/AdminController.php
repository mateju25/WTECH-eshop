<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::user() or Auth::user()->admin == false)
            return redirect('/');

        $products = Product::where('deleted', '=', false)->get();
        return view('admin')
            ->with('products', $products)
            ->with('businessTypes', BusinessType::all())
            ->with('categories', Category::all());
    }
}
