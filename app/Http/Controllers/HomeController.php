<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use App\Slide;

class HomeController extends Controller
{

    public function index()
    {
        $slides = Slide::all();
        $categories = Category::all();
        $items = Item::all();
        return view('welcome',compact('slides','categories','items'));
    }
}
