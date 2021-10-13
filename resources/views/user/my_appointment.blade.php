<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <style>
        tr>td{
            vertical-align: inherit!important;
        }
    </style>
</head>
<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info">
                        <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                        <span class="divider">|</span>
                        <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-dribbble"></span></a>
                        <a href="#"><span class="mai-logo-instagram"></span></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

            <form action="#">
                <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctors.html">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Route::has('login'))
                        @auth
                            <li class="nav-item badge badge-pill badge-success text-white">
                                <a class="nav-link text-white" href="{{url('/my-appointment')}}">My Appointment</a>
                            </li>
                            <x-app-layout>

                            </x-app-layout>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
                            </li>

                        @endauth
                    @endif
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>

<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card mt-4">
            <h1 class="text-center card-title my-3" style="font-size: 30px">My Appointment</h1>
            <hr>
            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success mb-2 text-center font-weight-bolder">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                <table class="table table-striped table-hover table-dark">
                    <thead>
                    <tr class="text-center">
                        <th>Doctor Profile</th>
                        <th>Doctor Name</th>
                        <th>Doctor Specialist</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Appointment Status</th>
                        <th>Cancel Appointment</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                            <tr class="text-center">
                                <td>
                                    <img src="{{asset('doctor_image/'.$appointment->getDoctor->image)}}" alt="" style="width: 60px;height: 60px;border-radius: 50%;background-size: contain">
                                </td>
                                <td class="text-nowrap">{{$appointment->getDoctor->name}}</td>
                                <td class="text-capitalize text-nowrap">{{$appointment->getDoctor->speciality}} Specialist</td>
                                <td class="text-nowrap"><i class="far fa-calendar mr-2"></i>{{$appointment->date}}</td>
                                <td class="text-nowrap">{{substr($appointment->message,0,20)}}</td>
                                <td>
                                    <span class="badge badge-pill @if($appointment->status == 'Pending') badge-warning @else badge-success @endif" style="font-size: 20px;cursor:pointer ">{{$appointment->status}}</span>
                                </td>
                                <td>
                                    <form action="{{url('/cancel-appointment')}}" class="cancelForm" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$appointment->id}}">
                                        <button class="cancelAppointment btn btn-danger btn-sm" type="submit"><i class="fas fa-x"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
