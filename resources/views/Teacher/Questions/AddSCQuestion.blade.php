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
      <h1>Add Single Choice Question</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Add SC Question</li>
        </ol>
      </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="newsletter-subscribe">
                <div class="container text-center">
                    <form action="" method="post" class="d-flex justify-content-center">
                    @csrf
                    <table class="table text-center table-borderless">
                        <tr>
                            <td colspan="2">
                                <select name="Exam" class="form-control form-select" id="">
                                    <option value="">Choose an Exam please</option>
                                    <option value="">Exam 1</option>
                                    <option value="">Exam 2</option>
                                    <option value="">Exam 3</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="question_text" id="" cols="30" rows="15" class="form-control" placeholder="Question Text"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" type="text" name="name" placeholder="Option 1">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="name" placeholder="Option 2">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" type="text" name="name" placeholder="Option 3">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="name" placeholder="Option 4">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select name="correct_option" class="form-control form-select" id="">
                                    <option value="">Choose the Correct Option</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input class="form-control" type="number" name="point" placeholder="Question point">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-primary mt-2 btn-block" type="submit">Add</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection