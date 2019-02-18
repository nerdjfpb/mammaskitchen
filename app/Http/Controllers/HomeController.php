<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class HomeController extends Controller
{

    public function index()
    {
        $slides = Slide::all();
        return view('welcome',compact('slides'));
    }
}
