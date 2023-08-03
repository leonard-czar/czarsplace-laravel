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

        .brandname {
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
        }

        .resfont {
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
    <div class="container-fluid-sm ">
        <nav class="navbar navbar-light bg-light" style="background-color: #050C24!important;">
            <div class="container-fluid">
                <a class="navbar-brand " href="/admindashboard" id="brandname">
                    <h3>{{config('app.name',"Czar's
                        Place")}}</h3>
                </a>
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
                            <a class="nav-link brandname" aria-current="page"
                                href="{{url('/admindashboard')}}"><b>Dashboard</b> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname" href="/allproduct"><b>Products</b> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname" href="/allbrands"><b> All Brands</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname" href="/allorders"><b>All Orders</b> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link brandname" href="/allusers"><b>Users</b> </a>
                        </li>
                    </ul>
                    <a href="{{ route('logout') }}" style="color:white;" id="logout"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="btn btn-outline-danger btn-sm"><b>Logout</b>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>


        <main>
            @include('flash-message')
            @yield('content')
        </main>

        <!--COPYRIGHT-->
        <footer style="justify-content:space-between;background-color: #050C24;">
            <div class="container-fluid">
                <div class="row">
                    <p class="col mt-1" style="text-align:center; color:rgba(255, 255, 255,0.5);font-family:czars;
            justify-content:center;" id="copyright_txt">&copy;
                        <?php echo date("Y"); ?> {{config('app.name',"Czar's Place")}}
                    </p>
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