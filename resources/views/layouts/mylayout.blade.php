<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8 ">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-to">
  <meta name="author" content="leonard lebechi">
  <meta name="description" content="your one stop shop for wristwatches">
  <meta name="keywords" content="czar's Place,wristwatch,luxury watch,mechanical watch,
    time,timepiece,online store,watch store,watch collection,
    lagos,rolex,hublot,patek phillepe,">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon_io/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon_io/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon_io/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('favicon_io/site.webmanifest')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
  <title> @yield('title') {{config('app.name',"Czar's Place")}} Haven for luxury wristwatches</title>

  <style>
    @font-face {
      font-family: 'czars';
      src: url('Unica_One/UnicaOne-Regular.ttf');
    }

    @font-face {
      font-family: 'czars3';
      src: url('Pacifico/Pacifico-Regular.ttf');
    }

    @font-face {
      font-family: 'czars2';
      src: url('Padauk/Padauk-Regular.ttf');
    }

    #brandname {
      font-family: czars, sans-serif;
      text-decoration: none;
      color: white;
    }

    .brandname {
      font-family: czars, sans-serif;
      text-decoration: none;
      color: white;
    }

    .bannertxt {
      font-family: czars3, sans-serif;
      color: white;
      font-size: 4.5vw;
      padding: auto;
    }

    #copyright_txt {
      font-family: czars, sans-serif;
      color: white;
      font-size: 1.2vw;
    }

    .row1 {
      font-size: 1.1vw;
      text-transform: capitalize;
    }

    .footr {
      font-family: czars, sans-serif;
      color: white;
    }

    .price {
      color: rgba(0, 0, 0, 0.6);
      margin-top: 2px;
    }

    a,
    a:hover {
      text-decoration: none;
      color: black;
    }

    .nav-item :hover {
      color: white !important;
    }

    #drop :hover {
      color: white !important;
    }

    .navbar-brand:hover {
      color: white !important;
    }

    #acct:hover {
      color: white !important;
    }

    #whatsapp {
      position: fixed;
      justify-content: flex-end;
      display: flex;
      top: 350px;
      right: 20px;
    }

    #spanwhatsapp {
      border: 2px solid white;
      color: rgba(0, 0, 0, 0.9);
      background-color: white;
      font-size: 1vw;
      border-radius: 7%;
      padding: 3px;
    }

    .socials {
      background-color: rgba(255, 255, 255, 0.5);
      border-radius: 30%;
    }
  </style>

</head>

<body>

  <!-------------NAVBAR----------->
  <div class="container-fluid-sm">
    <nav class="navbar navbar-light bg-light" style="background-color: #050C24!important;">
      <div class="container-fluid">
        <a class="navbar-brand " href="{{ route('dashboard')}}" id="brandname">
          <h3>{{config('app.name',"Czar's
            Place")}}</h3>
        </a>
        <form class="d-flex" method="post" action="/redirect">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name="btnsearch">Search</button>
        </form>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #050C24!important;">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
          aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-1 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link brandname" aria-current="page" href="{{ url('/') }}">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link brandname" href="{{ url('/index_displaybrands')}}">BRANDS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link brandname" href="{{url('/index_malewatches')}}">MEN COLLECTION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link brandname" href="{{ url('/index_femalewatches')}}">LADIES COLLECTION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link brandname" href="/userorder">MY ORDERS</a>
            </li>
          </ul>
          <li class="nav-item d-flex ">
            <a class="nav-link brandname" style="color:rgba(255, 255, 255,0.5);" href="{{route('login')}}">
              ACCOUNT</a>
          </li>
        </div>
      </div>
    </nav>


    <div>
      @include('flash-message')
      @yield('content')
    </div>

    <footer style="justify-content:space-between;background-color: #050C24;">
      <div class="container-fluid-sm">
        <div class="row" style="border-bottom: 1px solid ; ">

          <div class="col-sm-4 mt-4 " style="text-align:center ;
color:rgba(255, 255, 255,0.5);font-size: 10px!important;" id="aboutus">
            <div class="footr">
              <h3>About Us</h3>
            </div>
            <div style="padding:10px;">
              <b>Luxury</b> is what sets apart ambitious people from others.
              <b>Style </b>is what sets apart sophisticated people from others.
              <b>Quality</b> is what sets wise people apart from others.
              At <b>Czar's Place</b>, our vision is to provide our clients with premium watchesthat have luxury, style,
              and quality.
              Our products will help you create your own style statement that is bold and classy. <br>
              <span><b><i>Why choose us?</i> </b> </span> <br>
              One word: <b>honesty</b>. Our unmatched honesty regarding our products is something our clients will find
              rare in the industry.
              Our recommendations will be tailored to your needs, and we will help you embody your very own style
              statement.

              <h6> Our Core Values</h6>
              <span><b>Customers Come First,</b> We do not want to sell you mere objects.
                We want to adorn you with the best luxury watches and jewelry money could possibly buy.</span>
              <span><b> Authentic To The Core</b></span> <br>
              You can throw your fears of being tricked into buying something fake. Integrity, honesty,
              and authenticity lie in our foundations and sets us apart from others.

              <span><b>Variety of Style</b> </span> <br>
              <span>We are constantly searching,
                looking and talking for new pieces to add to our collection.
                We understand the importance of diversity in style and we make sure that you find everything you are
                looking for here at<b> Czars</b>.
                Our collections include all the important and famous name brands,
                and when you're choosing to do business with us, you don't need to worry about running out of
                style.</span>

            </div>

          </div>

          <div class="col-sm-3  mt-4" style="text-align:center ;">
            <h3 class="footr"> DISCLAIMER</h3>
            <p style="color:rgba(255, 255, 255,0.5);
               font-size: 13px!important;"> We are not an official dealer for the products we sell and have no
              affiliation with the manufacturer.
              All brand names and trademarks are the property
              of their respective owners and are used for identification purposes only.</p>
          </div>
          <!--SOCIALS-->

          <div class="col-sm-3  mt-4" style=" text-align:center;">
            <h3 class="footr">FOLLOW US</h3>
            <a href="http://facebook.com" target="_blank" style="text-decoration: none; "> <img
                src="{{asset('images/fb1.png')}}" alt="facebook page" width="40" class="socials"></a>

            <a href="http://twitter.com" target="_blank" style="text-decoration: none;"><img
                src="{{asset('images/twitter2.png')}}" alt="twitter page" width="40" class="socials"> </a>

            <a href="http://instagram.com" target="_blank" style="text-decoration: none;">
              <img src="{{asset('images/ig1.png')}}" alt="instagram page" width="40" class="socials">
            </a>
            <!--WHATSAPP-->

            <a id="whatsapp" href="http://whatsapp.com" target="_blank" style="text-decoration: none;">
              <div class="mt-2 me-2 opacity-50"><span id="spanwhatsapp">
                  <b>chat with us</b> </span></div>
              <img src="{{asset('images/wats2.png')}}" alt="whatsapp" width="40" style=" border-radius: 20%;">
            </a>
          </div>

          <div class="col-sm-2  mt-4" style="text-align:center; padding-left:7px;padding-right:7px" id="contactus">
            <div>
              <h3 class="footr"> CONTACT US</h3>
              <div style="color:rgba(255, 255, 255,0.5);font-size: 13px;font-family:czars;padding-bottom:5px">
                <i class="fa-solid fa-phone text-light">
                </i> 08182281634
              </div>
              <div>
                <a href="contactus2.php" style="text-decoration: none;color:rgba(255, 255, 255,0.5);font-size: 13px;">
                  <i class="fa-solid fa-message text-light"></i> message </a>
              </div>

            </div>


          </div>
        </div>
      </div>

      <!--COPYRIGHT-->
      <div class="row">
        <p class="col mt-1" style="text-align:center; color:rgba(255, 255, 255,0.5);font-family:czars;
            justify-content:center;">&copy; {{date("Y")}} {{config('app.name',"Czar's Place")}}</p>
      </div>
  </div>
  </footer>
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>