<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\history;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rent (Request $request)
    {
        $id = $request->input('hotelId');
        $roomId = $request->input('roomId');
        $hotel = hotel::where('id',$id)->first();
        $room = $hotel->room->where('id',$roomId)->first();

        return view('hotel.rent')->with( ['hotel' => $hotel,'room'=> $room]);
    }

    public function rentFinal (Request $request)
    {
        $fName = $request->input('fName');
        $lName = $request->input('lName');
        $checkIn = $request->input('checkIn');
        $jumlah = $request->input('jmlh');
        $id = $request->input('hotelId');
        $roomId = $request->input('roomId');
        $checkOut = $request->input('checkOut');
        $hotel = hotel::where('id',$id)->first();
        $room = $hotel->room->where('id',$roomId)->first();
        $total = $room->cost * $jumlah;

        $history = new history;
        $history->user_id = Auth::user()->id;
        $history->total = $total;
        $history->checkIn = $checkIn;
        $history->checkOut = $checkOut;
        $history->hotel_id = $hotel->id;
        $history->room_id = $room->id;
        $history->bookDate = Carbon::now();
        $history->save();

        return redirect('/')->with('success', 'Asyik! Ruangan hotel berhasil dipesan! Pemesanan yang telah berhasil dilakukan dapat dilihat pada Riwayat Pemesanan Anda.');

    }
}