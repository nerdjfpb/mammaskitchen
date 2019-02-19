<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Item;
use App\Reservation;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $sliderCount = Slide::count();
        $reservationCount = Reservation::count();
        $contactCount = Contact::count();
        return view('admin.dashboard',compact('categoryCount','itemCount','sliderCount','reservationCount','contactCount'));
    }
}
