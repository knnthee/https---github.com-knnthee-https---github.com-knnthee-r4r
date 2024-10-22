<!DOCTYPE html>
<html>
<head>
    @include('owner.css')

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
        h1 {
    padding-top: 30px; /* Padding only on the top for h1 */
}

h2 {
    padding-top: 40px; /* Padding only on the top for h2 */
}


    </style>

    @include('owner.header')
    @include('owner.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <a href="{{ route('export.bookings') }}" class="btn btn-primary">Export Bookings</a>

                <!-- Approved Room Table -->
                <h1>Approved Bookings</h1>
                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Room ID</th>
                        <th class="th_deg">Customer Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Arrival Date</th>
                        <th class="th_deg">Leaving Date</th>
                        <th class="th_deg">Status</th>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                       
                    </tr>
               
                    @foreach($approvedRoom as $data)
                    <tr>
                        <td>{{$data->room_id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->start_date}}</td>
                        <td>{{$data->end_date}}</td>
                        <td><span style="color: green;">Approved</span></td>
                        <td>{{$data->room->room_title}}</td>
                        <td>₱{{$data->room->price}}.00</td>
                        <td>
                            <img style="width: 200px!important" src="/room/{{$data->room->image}}" loading="lazy">
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this');" class="btn btn-danger" href="{{url('delete_booking', $data->id)}}">Delete</a>
                        </td>
                     
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    @include('owner.footer')

</body>
</html>
