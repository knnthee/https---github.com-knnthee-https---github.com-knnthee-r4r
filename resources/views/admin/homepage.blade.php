<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
</body>
</html><!DOCTYPE html>
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
      @include('home.ulo')
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      @include('home.slider')
      <!-- end banner -->
      <!-- about -->
      <div class="about">
        <div class="container-fluid">
           <div class="row">
              <div class="col-md-5">
                 <div class="titlepage">
                    <h2>About Us</h2>
                    <p> At staywise, we make it easy to find the perfect
                      dorm or room in Dagupan, Pangasinan, offering a convenient and reliable
                   platform to match you with your ideal accommadation </p>
                    <a class="read_more" href="{Javascript:void(0)}"> Read More</a>
                 </div>
              </div>
              <div class="col-md-7">
                 <div class="about_img">
                    <figure><img src="images/about.png" alt="#"/></figure>
                 </div>
              </div>
           </div>
        </div>
     </div>
      <!-- end about -->
      <!-- our_room -->

      @include('home.room')
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