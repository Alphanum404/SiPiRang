<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Rent;
use App\Models\Building;
use Illuminate\Http\Request;

class DashboardRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.rooms.index', [
            'title' => "Ruangan",
            'rooms' => Room::latest()->get(),
            'buildings' => Building::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->file('img')->store('room-image');

        $validatedData = $request->validate([
            'code' => 'required|max:4',
            'name' => 'required',
            'img' => 'image',
            'floor' => 'required',
            'capacity' => 'required',
            'building_id' => 'required',
            'type' => 'required',
            'description' => 'required|max:250',
        ]);

        if ($request->file('img')) {
            $validatedData['img'] = $request->file('img')->store('room-image');
        } else {
            $validatedData['img'] = "room-image/roomdefault.jpg";
        }

        $validatedData['status'] = false;

        Room::create($validatedData);

        return redirect('/dashboard/rooms')->with('roomSuccess', 'Data ruangan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('dashboard.rooms.show', [
            'title' => $room->name,
            'room' => $room,
            'rents' => Rent::where('room_id', $room->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return json_encode($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        Room::destroy($room->id);
        return redirect('/dashboard/rooms')->with('deleteRoom', 'Data ruangan berhasil dihapus');
    }
}