<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with(['activeDishes' => function($query) {
            $query->orderBy('sort_order');
        }])->where('is_active', true)->get();

        return view('front.menu.index', compact('categories'));
    }

    public function show($slug)
    {
        $dish = Dish::where('slug', $slug)->where('is_available', true)->firstOrFail();
        $relatedDishes = Dish::where('category_id', $dish->category_id)
                           ->where('id', '!=', $dish->id)
                           ->where('is_available', true)
                           ->take(4)
                           ->get();

        return view('front.menu.show', compact('dish', 'relatedDishes'));
    }
}
