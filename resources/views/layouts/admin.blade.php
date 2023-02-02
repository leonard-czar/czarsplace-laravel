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

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">

    <title></title>

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

        .bannertxt {
            font-family: czars3, sans-serif;
            color: rgba(0, 0, 0, 0.8);
            font-size: 4.5vw;
            border-radius: 55%;
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
        <div>
            <div class="row " style="border-bottom: 1px solid ;background-color: #050C24;padding-bottom:30px;padding-left:22px;">
                <div class="col-sm mt-sm-1 pt-sm-2" style="color:rgba(255, 255, 255);">
                    <a href="/admindashboard" id="brandname">
                        <h1 class="text-center">
                            {{config('app.name',"Czar's Place")}}
                        </h1>
                    </a>
                </div>
            </div>
        </div>



        <div class="row " style="background-color: #050C24;position:
                sticky;top: 0;z-index:1; padding-left:12px;display:flex; ">
            <div>
                <nav class="navbar navbar-expand navbar-light">
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mb-sm-2 col-sm">
                            <li class="nav-item col-sm-2" style="padding-left: 10px;">
                                <a class="nav-link " href="{{url('/admindashboard')}}" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b> Dashboard</b>
                                </a>
                            </li>
                            <li class="nav-item col-sm-2" style="padding-left: 10px;">
                                <a class="nav-link " href="/allproduct" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b> Products</b>
                                </a>
                            </li>
                            <li class="nav-item col-sm-2" style="padding-left: 10px;">
                                <a class="nav-link " href="/allbrands" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b> All Brands</b>
                                </a>
                            </li>
                            <li class="nav-item col-sm-2" style="padding-left: 10px;">
                                <a class="nav-link " href="/allorders" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b> All Orders</b>
                                </a>
                            </li>
                            <li class="nav-item col-sm-2" style="padding-left: 10px;">
                                <a class="nav-link " href="/allusers" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b>Customers</b>
                                </a>
                            </li>
                            <li class="col-sm mt-sm-1 offset-sm-1">
                                <a href="{{ route('logout') }}" style="color:white;font-size:1.1vw!important;" id="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-outline-danger btn-sm"><b>Logout</b>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <main>
            @include('flash-message')
            @yield('content')
        </main>

        <!--COPYRIGHT-->
        <footer style="justify-content:space-between;background-color: #050C24;">
            <div class="container-fluid-sm">
                <div class="row">
                    <p class="col mt-1" style="text-align:center; color:rgba(255, 255, 255,0.5);font-family:czars;
            justify-content:center;" id="copyright_txt">&copy; <?php echo date("Y"); ?> {{config('app.name',"Czar's Place")}}</p>
                </div>
            </div>
        </footer>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" language="javascript">
            function Updatestatus(e) {
                var response = confirm('Are you sure you want to update this order?');
                if (response == true) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            }

            function validateDelete(e) {
                var response = confirm('Are you sure you want to delete this Brand?');
                if (response == true) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            }

            function Deleteproduct(e) {
                var response = confirm('Are you sure you want to delete this product?');
                if (response == true) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            }
        </script>