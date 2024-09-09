<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category');
    
        $products = Product::when($selectedCategory, function ($query) use ($selectedCategory) {
            return $query->where('category', $selectedCategory);
        })
        ->get();
    
        $categories = Product::select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->pluck('count', 'category');
    
        return view('home', compact('products', 'categories', 'selectedCategory'));
    }    

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}