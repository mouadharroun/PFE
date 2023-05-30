@extends('layouts.TeacherBody')
@section('content')

<div class="pagetitle">
      <h1>Add Exam</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Add Exam</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if(session('messageC'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('messageC')}}</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
    @endif
    <section class="section dashboard">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="newsletter-subscribe">
                <div class="container text-center">
                    <form action="/teacher/AddExam" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <select name="course" class="form-control form-select" id="">
                            <option value="">Choose a Course</option>
                            @foreach ($exams as $exam)
                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                        <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Exam name"></div>
                        <div class="form-group"><input class="form-control" type="number" name="duration" placeholder="Exam duration"></div>
                        <div class="form-group"><button class="btn btn-primary mt-2" type="submit">Add</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection