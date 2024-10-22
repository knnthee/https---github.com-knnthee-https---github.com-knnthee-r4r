<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    @include('admin.header')
    @include('admin.sidebar')

    <style type="text/css">
        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
        }
        .th_deg {
            background-color: rgb(255, 255, 255);
            padding: 15px;
        }
        tr {
            border: 3px solid white;
        }
        td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <!-- Approved Rooms Table -->
               

                <!-- Rejected Rooms Table -->
                <h2>Rejected Rooms</h2>
                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Wifi</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Status</th>
                    </tr>
                    @foreach($rejectedRooms as $room)
                    <tr>
                        <td>{{$room->room_title}}</td>
                        <td>{!! Str::limit($room->description, 150) !!}</td>
                        <td>₱{{$room->price}}</td>
                        <td>{{$room->wifi}}</td>
                        <td>{{$room->room_type}}</td>
                        <td><img width="100" src="room/{{$room->image}}"></td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger" href="{{url('room_delete', $room->id)}}">Delete</a>
                        </td>
                        <td>
                            <span style="color: red"class="status-rejected">Rejected</span>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
              
            </div>
        </div>
    </div>
    
    @include('admin.footer')
</body>
</html>
