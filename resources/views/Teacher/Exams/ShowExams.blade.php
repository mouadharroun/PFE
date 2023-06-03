@extends('layouts.TeacherBody')
@section('content')


        <div class="pagetitle">
        <h1>All Exams</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Show Exams</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Duration</th>
                            <th scope="col" colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($exams)
                        @foreach ($exams as $exam)
                        <tr>
                            <td scope="row">{{$exam->id}}</td>
                            <td>{{$exam->name}}</td>
                            <td>{{$exam->duration}}</td>
                            <td>
                                <a href="/teacher/ShowExam/{{$exam->id}}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="/Delete/{{$exam->id}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                
                <!-- End Table with stripped rows -->

                </div>
            </div>

            </div>
        </div>
        </section>


  @endsection