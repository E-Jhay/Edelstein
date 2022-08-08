<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $new = Product::where('condition', 'new')->take(8)->get();
        $default = Product::where('condition', 'default')->take(8)->get();
        $hot = Product::where('condition', 'hot')->take(8)->get();
        return view('mainPage.index', compact('new', 'hot', 'default'));
    }

    public function aboutUs()
    {
        return view('mainPage.about-us');
    }

    public function contactUs()
    {
        return view('mainPage.contact-us');
    }

    public function privacyPolicy()
    {
        return view('mainPage.privacy-policy');
    }
}
