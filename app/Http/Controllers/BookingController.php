<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RoomType;
use App\Models\Booking;
use App\Models\Roomtypeimage;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = Customer::all();
        return view('booking.create', ['data'=> $customers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'customer_id' => 'required',
            'room_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'total_adults' => 'required',
        ]);
        $data = new Booking();
        $data->customer_id = $request->customer_id;
        $data->room_id = $request->room_id;
        $data->checkin_date = $request->input('checkin_date');
        $data->checkout_date = $request->input('checkout_date');
        $data->total_adults = $request->total_adults;
        $data->total_children = $request->total_children;

        $data->save();
        $ref = $request->ref;
        if($ref= "front"){
            return redirect('booking')->with('success', 'booking has been added successfully');

        }
        else{

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //check available_rooms
    public function available_rooms(Request $request, $checkin_date)
    {
        $available_rooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date'BETWEEN checkin_date AND checkout_date)");

        $data = [];
        foreach ($available_rooms as $room) {
            $roomtype = RoomType::find($room->room_type_id);
            $data[] = ['room'=> $room, 'roomtype'=>$roomtype];
        }

        return response()->json(['data' => $data]);
    }

    public function front_booking()
    {

        return view('front_booking');

    }
}
