<?php 
    @include("head.blade.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daher_Exams</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interface.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
    crossorigin="anonymous">
</head>
<body>
    <section class="home-bg" id="home">
        <div class="n-wrapper">
            <div class="flexCenter paddings innerWidth n-container">
                <img src="{{ asset('Interface_imgs/daherLogo.png') }}" alt="logo" class="mb-5" width="85" />
                <div class="flexCenter n-menu">
                    <nav class="navbar navbar-expand-lg ">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Log In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('Register') }}">Sign up</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="content">
            <h1>Welcome to <span>Daher Exams</span></h1>
            <p>
                Here u can find everything about the Formation that we provide to our precious Employees 
                <br>learn more about it at Daher Exams 
            <p>
            <button class="btns" type="button"><span></span><a class="learn" href="https://www.daher.com/en/">Learn More!</a></button>
        </div>
        
    </section>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
</body>
</