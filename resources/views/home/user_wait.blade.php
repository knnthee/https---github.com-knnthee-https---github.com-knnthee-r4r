<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
      @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
  
      <!-- end about -->
      <!-- our_room -->
      <style type="text/css">

        .table_deg
        {
            border: 2px solid white;
            margin: auto;
            width:80%;
            text-align: center;
            margin-top: 40px;
        }
    
        .th_deg
        {
            background-color: rgb(255, 255, 255);
            padding: 15px;
        }
        
        tr
        {
            border: 3px solid white;
        }
    
        td
        {
            padding: 10px;
        }
        
        </style>
    
        <div class="page-content">
            <div class="page-header">
              <div class="container-fluid">
    
    
                <table class="table_deg">
    
                    <tr>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Wifi</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Status</th>
                    </tr>
    
                    @foreach($booking as $booking)
                    <tr>
                        <td>{{$booking->room->room_title}}</td>
                        
                        <td>{!! Str::limit ($booking->room->description,150) !!}</td>
                        <td>₱{{$booking->room->price}}</td>
                        <td>{{$booking->room->wifi}}</td>
                        <td>{{$booking->room->room_type}}</td>
                        
                        <td>
                            <img width="200" src="room/{{$booking->room->image}}">
                        </td>
             
                       

                
                        <td>
                            @if($booking->status == 'approved')
    
                            <span style="color: green;">Approved</span>
    
                            @endif
    
                            @if($booking->status == 'rejected')
    
                            <span style="color: red;">Rejected</span>
    
                            @endif
    
                            @if($booking->status == 'waiting')
    
                            <span style="color: yellow;">Waiting</span>
                            @endif
                        </td>
                        @endforeach
                    </tr>
    
                    
    
    
                </table>
    
      <!-- end our_room -->
      <!-- gallery -->
    
      <!-- end gallery -->
      <!-- blog -->
      
      <!-- end blog -->
      <!--  contact -->
      
      <!-- end contact -->
      <!--  footer -->
     @include('home.footer')
   </body>
</html>