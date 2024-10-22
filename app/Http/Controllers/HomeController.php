<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);

        return view('home.room_details', compact('room'));
    }

    public function  add_booking(Request $request ,  $id)
    {

        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);


        $data = new Booking;

        $data->room_id = $id;

        $data->name = $request-> name;
        $data->email = $request-> email;
        $data->phone = $request-> phone;



        $startDate = $request-> startDate;
        $endDate = $request-> endDate;
        
        $isBooked = Booking::where('room_id', $id)
        ->where('start_date', '<=', $endDate)
        ->where('end_date', '>=',$startDate)->exists();

        if($isBooked)

        {
            return redirect()->back()->with('message', 'Room is already booked ');
        }


        else
        {
            
        $data->start_date = $request-> startDate;
        $data->end_date = $request-> endDate;
        $data->save();

        return redirect()->back()->with('message', 'Room Booked Succesfully');

        }
        
    }

    public function room($id)
    {
        $room = Room::find($id);

        return view('home.room_details', compact('room'));
    }

    public function our_rooms()
    {

        $room= Room::where('status','approved')->get();
    return view('home.our_rooms', compact('room'));
   

    }
    public function user_wait()
    {
        $room= room::all();

        $booking= Booking::all();
    return view('home.user_wait', compact('booking','room'));

    }


    public function rooms()
    {
        $approvedRooms = Room::where('status', 'approved')->get();
        $rejectedRooms = Room::where('status', 'rejected')->get();
        $waitingRooms = Room::where('status', 'waiting')->get();
    
        return view('owner.view_room', compact('approvedRooms', 'rejectedRooms','waitingRooms'));
    }


    public function homepage()
    {

        $room= Room::where('status','approved')->get();
    return view('home.homepage', compact('room'));
   
    }
    public function cancel_booking($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return redirect()->back()->with('error', 'Room not found');
        }

        $room->status = 'cancelled';
        $room->save();

        return redirect()->back()->with('success', 'Room cancelled successfully');
    }
   
}
