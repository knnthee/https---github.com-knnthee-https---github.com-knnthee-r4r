<!DOCTYPE html>
<html lang="en">
<head>
    @include('owner.css')
    @include('owner.header')
    @include('owner.sidebar')

    <style type="text/css">
        body {
            background-color: #f8f9fa; /* Light background for contrast */
        }

        .container-fluid {
            margin-top: 20px;
        }

        .table_deg {
            border: 2px solid #007bff; /* Border color */
            margin: auto; /* Center the table */
            width: 90%; /* Ensure all tables have the same width */
            text-align: center; /* Center text within the table cells */
            margin-top: 40px; /* Space above the table */
            border-radius: 8px; /* Rounded corners for the table */
            overflow: hidden; /* Clip child elements */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            background-color: #ffffff; /* White background for the table */
        }

        .th_deg {
            background-color: #ffffff; /* Header background color */
            color: rgb(0, 0, 0); /* White text for contrast */
            padding: 15px; /* Padding for header cells */
        }

        tr {
            border: 1px solid #dee2e6; /* Light gray border for rows */
        }

        td {
            color: black;
            padding: 12px; /* Slightly increased padding */
            background-color: #ffffff; /* White background for cells */
        }

        tr:hover {
            background-color: #f1f1f1; /* Highlight on hover */
        }

        .btn {
            margin: 5px; /* Spacing between buttons */
        }

        img {
            border-radius: 5px; /* Rounded image corners */
            max-width: 100px; /* Ensure images are responsive */
            height: auto; /* Maintain aspect ratio */
        }

        .status-approved {
            color: green;
        }

        .status-rejected {
            color: red;
        }

        .status-waiting {
            color: orange; /* More distinct color for waiting */
        }
    </style>
</head>
<body>
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="text-center">Room Management</h2>

            

                <h3 class="mt-4">Rejected Rooms</h3>
                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Wifi</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Actions</th>
                        <th class="th_deg">Status</th>
                    </tr>
                    @foreach($rejectedRooms as $data)
                    <tr>
                        <td>{{$data->room_title}}</td>
                        <td>{!! Str::limit($data->description, 150) !!}</td>
                        <td>₱{{$data->price}}</td>
                        <td>{{$data->wifi}}</td>
                        <td>{{$data->room_type}}</td>
                        <td>
                            <img src="room/{{$data->image}}" alt="Room Image">
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger" href="{{url('room_delete', $data->id)}}">Delete</a>
                            <a class="btn btn-warning" href="{{url('room_update', $data->id)}}">Update</a>
                        </td>
                        <td>
                            <span class="status-rejected">Rejected</span>
                        </td>
                    </tr>
                    @endforeach
                    <div class="pagination">
                        {{ $rejectedRooms->links()}}
                    </div>
                </table>

               
            </div>
        </div>
    </div>

    @include('owner.footer')
</body>
</html>
