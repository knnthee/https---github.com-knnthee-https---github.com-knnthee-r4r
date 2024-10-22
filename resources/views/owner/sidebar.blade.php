
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        
        
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">OWNER</span>
      <ul class="list-unstyled">
              <li> <a href="{{url('home')}}"> <i class="icon-home"></i>Home </a></li>

              <li><a href="{{url('create_room')}}" > <i class="icon-home"></i>add rooms</a></li>
             
              <li><a href="#roomDropdown" aria-expanded="false" data-toggle="collapse"> 
                <i class="icon-windows"></i>Listings </a>
                <ul id="roomDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('view_room')}}">Approved Rooms </a></li>
                  <li><a href="{{url('rejected_room')}}">Rejected Rooms</a></li>
                  <li><a href="{{url('pending_room')}}">Pending Rooms</a></li>
                  
                </ul>
                <li><a href="#bookingDropdown" aria-expanded="false" data-toggle="collapse"> 
                  <i class="icon-windows"></i>Bookings </a>
                  <ul id="bookingDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('bookings')}}">Pending Bookings</a></li>
                    <li><a href="{{url('approved')}}">Approved Bookings</a></li>
                    <li><a href="{{url('rejected')}}">Rejected Bookings</a></li>
                    <li><a href="{{url('cancelled')}}">Cancelled Bookings</a></li>
                    
                  </ul>

             
             
      </ul>
    </nav>
   
    <!-- Sidebar Navigation end-->