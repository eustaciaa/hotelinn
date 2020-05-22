<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

/* Model Imports */
use App\alamat;
use App\provinsi;
use App\room_details;
use App\hotel;

class MainController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with(['hotels' => alamat::all(), 'provinsis' => provinsi::all()]);
    }

    /**
     * Show The Hotel List
     */
    public function getHotel(Request $request)
    {
        $kotaId = $request->input('kotaId');
        $provinsiId = $request->input('provinsiId');
        $query = ['provinsi_id'=> $provinsiId, 'kota_id' => $kotaId];
        $alamat = alamat::where($query)->join('hotel','alamat.hotel_id','=','hotel.id')->get();
        return json_encode($alamat, JSON_HEX_TAG);
    }

    /**
     * Show Room Available
     */

    public function showRoom(Request $request){
        $hotelId = $request->input('hotelId');

        $hotel = hotel::find($hotelId);

        $rooms = room_details::where('hotel_id', $hotelId)->get();

        return view('hotel.list')->with(['rooms' => $rooms, 'hotel' => $hotel]);
    }

    public function rentHotel(Request $request)
    {
        if($request->input('order'))
        {
            $order = $request->input('order');
        }
        else{
            $order = 'asc';
        }
        $id = $request->input('hotelId');
        $rooms = room_details::where('hotel_id',$id)->orderBy('cost',$order)->get();

        return view('hotel.room')->with(['roomdetails' => $rooms,'hotelId' => $id]);
    }

}