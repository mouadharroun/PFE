@extends('layouts.TeacherBody')
@section('content')


<table id="resultsDataTable" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Exam</th>
            <th>Course</th>
            <th>Lecturer</th>
            <th>Total Ques</th>
            <th> Duration</th>
            <th>Date</th>
            <th><i class="bi bi-search"></i></th>
        </tr>
    </thead>
    <tbody>

        @foreach($exams as $exam)

        <tr>
            <td>{{ $exam->name }}</td>
            <td>System Architect</td>
            <td>{{ auth()->user()->name}}</td>
            <td>{{ $exam->questions->count() }}</td>
            <td>{{ $exam->duration }}</td>
            <td>06/02/2023</td>
            <td><div class="text-center">
                <a class="btn btn-xs bg-green" href="http://localhost/OnlineExaminationCI/hasilujian/detail/5">
                    <i class="bi bi-search"></i> View Results
                </a>
            </div></td>
        </tr>

        @endforeach

       
        
    </tbody>
    
</table>

@endsection
  

  