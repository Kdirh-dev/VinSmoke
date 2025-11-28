<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredDishes = Dish::where('is_featured', true)
                            ->where('is_available', true)
                            ->orderBy('sort_order')
                            ->take(6)
                            ->get();

        $galleryImages = Gallery::active()
                              ->orderBy('sort_order')
                              ->take(8)
                              ->get();

        return view('front.home.index', compact('featuredDishes', 'galleryImages'));
    }

    public function about()
    {
        return view('front.home.about');
    }

    public function contact()
    {
        return view('front.home.contact');
    }
}
