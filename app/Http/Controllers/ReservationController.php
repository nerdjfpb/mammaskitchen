<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
//use Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'dateandtime'=>'required',
        ]);

        $reservation = new Reservation();
        $reservation->name= $request->name;
        $reservation->phone= $request->phone;
        $reservation->email= $request->email;
        $reservation->date_and_time= $request->dateandtime;
        $reservation->message= $request->message;
        $reservation->status= false;
        $reservation->save();

        Toastr::success('Reservation request send successfully. We will Confirm to you shortly', 'Sucess', ["positionClass" => "toast-top-center"]);
        return redirect()->back();

    }
}
