<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;
use App\Models\RoomType;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roomtype = RoomType::all();
        $data = Room::all();
        return view('room.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roomtype = RoomType::all();
        return view('room.create',['roomtype'=> $roomtype]);

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
        $room = new Room();
        $room->room_type_id = $request->rt_id;
        $room->title = $request->input('title');
        $room->save();

        return redirect('admin/rooms/create')->with('success', 'Data has been added successfully');
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
        $data = Room::find($id);
        return view('room.show', ['data'=> $data]);
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
        $roomtype = RoomType::all();
        $data = Room::find($id);
        return view('room.edit', ['data'=> $data, 'roomtype'=> $roomtype]);
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
        $roomtype = Room::find($id);
        $roomtype->title = $request->input('title');
        $roomtype->save();

        return redirect('admin/rooms/'.$id. '/edit')->with('success', 'Data has been updated successfully');
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
        Room::where('id', $id)->delete();
        return redirect('admin/rooms')->with('success', 'Data has been deleted successfully');
    }
}
