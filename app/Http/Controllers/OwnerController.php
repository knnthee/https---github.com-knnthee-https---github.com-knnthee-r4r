<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;




class OwnerController extends Controller
{

  public function export()
{
    return Excel::download(new BookingsExport, 'bookings.xlsx'); // You can change the filename
}
    public function index()
    {
        $rooms = Room::where('owner_id', Auth::id())->get(); // Fetch rooms belonging to the logged-in owner
        return view('owner.my_rooms', compact('rooms'));
    }

    public function home()
    {
      $room = Room::all();
      return view('home.index', compact('room'));
    }

    public function create_room()
    {
      return view('owner.create_room');
    }

    public function add_room(Request $request)
    {
     $data = new Room ();
 
     $data->room_title = $request->title;
     $data->description = $request->description;
     $data->price = $request->price;
     $data->wifi = $request->wifi;
     $data->room_type= $request->type;
     $image=$request->image;
     if($image)
     {
      $imagename =time().'.'.$image->getClientOriginalExtension();
      $request->image->move('room',$imagename);
      $data->image= $imagename;
     }

     $data->save();
     
     return redirect()->back();

    }

    public function view_room()
{
    // Use paginate() to enable pagination, e.g., 5 items per page
    $approvedRooms = Room::where('status', 'approved')->paginate(5);


    // Pass the paginated data to the view
    return view('owner.view_room', compact('approvedRooms', ));
}
public function rejected_room()
{
    // Use paginate() to enable pagination, e.g., 5 items per page
   
    $rejectedRooms = Room::where('status', 'rejected')->paginate(5);
    

    // Pass the paginated data to the view
    return view('owner.rejected_room', compact('rejectedRooms'));
}
public function pending_room()
{
    // Use paginate() to enable pagination, e.g., 5 items per page

    $waitingRooms = Room::where('status', 'waiting')->paginate(5);

    // Pass the paginated data to the view
    return view('owner.pending_room', compact( 'waitingRooms'));
}


    public function room_delete($id)
    {

      $data =Room::find($id);

      $data->delete();
      return redirect()->back();

    }

    public function room_update($id)
    {

      $data = Room::find($id);
      return view('owner.update_room',compact('data'));

    }

    public function edit_room(Request $request, $id)
    {

      $data = Room::find($id);

      $data->room_title = $request->title;
      $data->description = $request->description;
      $data->price = $request->price;
      $data->wifi = $request->wifi;                                                                                                                                     
      $data->room_type = $request->type;
      $image=$request->image;
      if($image)
      {
      $imagename =time().'.'.$image->getClientOriginalExtension();
      $request->image->move('room',$imagename);
      $data->image= $imagename;
      }
     
      $data->save();
      Return redirect()->back();  
    }

    public function bookings()
    {
        
        $waitingRoom = Booking::where('status', 'waiting')->get();

        return view('owner.booking', compact('waitingRoom'));
    }
    public function approved()
    {
        $approvedRoom = Booking::where('status', 'approved')->get();
        

        return view('owner.approved', compact('approvedRoom',));
    }
    public function rejected()
    {
        $rejectedRoom = Booking::where('status', 'rejected')->get();
        

        return view('owner.rejected', compact('rejectedRoom',));
    }

    public function cancelled()
    {
        $cancelledRoom = Booking::where('status', 'cancelled')->get();
        

        return view('owner.cancelled', compact('cancelledRoom',));
    }

    public function delete_booking($id)
    {
      $data = Booking::find($id);

      $data->delete();

      return redirect()->back();
    }


    public function approve_book($id)
    {
      $booking = Booking::find($id);

      $booking->status='approved';
      $booking->save();

      return redirect()->back();
    }


    public function cancel_book($id)
    {
      $booking = Booking::find($id);

      if ($booking){
      $booking->status='cancelled';
      $booking->save();
      }
      return redirect()->back()->with('success', 'Booking has been cancelled successfully.'); 

    } 

    
    public function reject_book($id)
    {
      $booking = Booking::find($id);

      $booking->status='rejected';
      $booking->save();

      return redirect()->back();
    }
    
}
