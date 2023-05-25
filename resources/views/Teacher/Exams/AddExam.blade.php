@extends('layouts.TeacherBody')
@section('content')
<style>
    .newsletter-subscribe {
        color: #313437;
        background-color: #fff;
        padding: 50px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .newsletter-subscribe form {
        width: 100%;
        max-width: 400px;
    }

    .newsletter-subscribe p {
    color:#7d8285;
    line-height:1.5;
    }

    .newsletter-subscribe h2 {
    font-size:24px;
    font-weight:bold;
    margin-bottom:25px;
    line-height:1.5;
    padding-top:0;
    margin-top:0;
    color:inherit;
    }

    .newsletter-subscribe .intro {
    font-size:16px;
    max-width:500px;
    margin:0 auto 25px;
    }

    .newsletter-subscribe .intro p {
    margin-bottom:35px;
    }

    .newsletter-subscribe form {
    justify-content:center;
    }

    .newsletter-subscribe form .form-control {
    background:#eff1f4;
    border:none;
    border-radius:3px;
    box-shadow:none;
    outline:none;
    color:inherit;
    text-indent:9px;
    height:45px;
    margin-right:10px;
    min-width:250px;
    }

    .newsletter-subscribe form .btn {
    padding:16px 32px;
    border:none;
    background:none;
    box-shadow:none;
    text-shadow:none;
    opacity:0.9;
    text-transform:uppercase;
    font-weight:bold;
    font-size:13px;
    letter-spacing:0.4px;
    line-height:1;
    }

    .newsletter-subscribe form .btn:hover {
    opacity:1;
    }

    .newsletter-subscribe form .btn:active {
    transform:translateY(1px);
    }

    .newsletter-subscribe form .btn-primary {
    background-color:#055ada !important;
    color:#fff;
    outline:none !important;
    }
</style>
<div class="pagetitle">
      <h1>Add Exam</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Add Exam</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="newsletter-subscribe">
                <div class="container text-center">
                    <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <select name="course" class="form-control form-select" id="">
                            <option value="">Choose a Course</option>
                            <option value="">Course 1</option>
                            <option value="">Course 2</option>
                            <option value="">Course 3</option>
                        </select>
                    </div>
                        <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Exam name"></div>
                        <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Exam duration"></div>
                        <div class="form-group"><button class="btn btn-primary mt-2" type="submit">Add</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection