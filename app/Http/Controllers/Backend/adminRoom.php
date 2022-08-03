<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class adminRoom extends Controller
{
    public $rooms;
    // public $room_id;
    public function __construct()
    {
        $this->rooms = Room::orderby('rooms.id' , 'desc')->paginate(request('limit') ?? 7);
    }

    public function index(){
       
        // dd($rooms);
        return view('admin.adminRoom.adminRoom' , [ 'rooms' =>$this->rooms]);
    }

    public function create(Request $request){
        try {
            $room = new Room();
            $room->fill($request->all());
            $room->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            $th->false;
        }
    }

    public function distroy($id){
        $room = Room::find($id);
        if($room){
            $room->delete();
            session()->put('success', 'Xóa thành công !');
            return redirect()->route('room.index');
        }
    }

    public function edit($id){
        $roomDetail = Room::find($id);
        if($roomDetail){
            return view('admin.adminRoom.adminRoom' , [ 'roomDetail' => $roomDetail , 'rooms' => $this->rooms]);
        }
    }

    public function update(Request $request , room $room){
        // $roomDetail = Room::find($this->room_id);
        // dd($room);
        if($room){
           $room->fill($request->all());
           $room->save();
           return redirect()->back();
        }
    }
}