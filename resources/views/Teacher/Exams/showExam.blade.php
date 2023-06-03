
@extends('layouts.TeacherBody')
@section('content')
<div class="card">
      <div class="card-body">
        <h5 class="card-title">Les info d'examen: Backend Laravel</h5>

        <!-- Bordered Tabs Justified -->
        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">L'examen</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Les Questions</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Ajouter des question</button>
          </li>
        </ul>


        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
          <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
          
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="newsletter-subscribe">
                          <div class="container ">
                              <form action="" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="my-3">
                                  <label>Exam Course:</label>
                                  <select name="course" class="form-control form-select" id="">
                                      <option value="">Choose a Course</option>
                                      <option value="">Course 1</option>
                                      <option value="">Course 2</option>
                                      <option value="">Course 3</option>
                                  </select>
                              </div>
                                  <div class="form-group"><label>Exam Title:</label><input class="form-control" type="text" name="name" value="{{$exam->name}}"></div>
                                  <div class="form-group">
                                      <label>Exam Duration (in minutes):</label>
                                      <input class="form-control" type="text" name="name" value="{{$exam->duration}}"></div>
                                  <div class="form-group text-center"><button class="btn btn-primary mt-2" type="submit">Update Exam</button></div>
                              </form>
                          </div>  
                      </div>
                  </div>
              </div>
     
            
          </div>






            
          <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
          
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Questions</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Question Text</th>
                          <th scope="col">Question Options</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($exam->questions as $question)
                    <tr id="question-row-{{ $question->id }}">
                        <td scope="row">{{ $question->id }}</td>
                        <td scope="row" class="vertical-center">{{ $question->question_text }}</td>
                
                        <td scope="row">
                            <ul class="list-unstyled">
                                @foreach ($question->options as $option)
                                    <li class="{{ $option->is_correct ? 'text-success' : '' }}">
                                        @if ($question->question_type === 'true_false')
                                            @if ($option->option_text === 'true')
                                                True
                                            @else
                                                False
                                            @endif
                                        @else
                                            {{ $loop->iteration }}. {{ $option->option_text }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                
                        <td scope="row">
                            <button type="button" class="btn btn-danger delete-main-question-btn" data-question-id="{{ $question->id }}">
                                <span class="delete-icon"><i class="bi bi-trash3"></i></span>
                                <span class="spinner-border text-danger d-none delete-spinner" role="status"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
                
                  </tbody>
              </table>
              
              
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
          
          </div>
          <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">

              <h5 class="card-title m-2"> <i class="bi bi-plus-square"></i> Add New Question </h5>
              <div class="m-2 d-flex align-items-center justify-between">

                
                {{-- <button type="button" class="m-1 btn btn-info add-one-choice-qu"><i class="bi bi-ui-radios mr-1"></i> Choice</button> --}}
                <button type="button" class="m-1 btn btn-warning add-multiple-choice-qu"><i class="bi bi-check2-square mr-1">Multiple Choice</i></button>
                <button type="button" class="m-1 btn btn-secondary add-text-qu"><i class="bi bi-chat-left-text mr-1"></i>Text</button>
                <button type="button" class="m-1 btn btn-success add-true-false-qu"><i class="bi bi-card-checklist mr-1"></i>True/False</button>
              </div>

                <div class="card-body question-added-container">
                  
    
                </div>
              
                <div class="d-flex justify-center" style="width: 100%">

                 
                </div>
              
       
            </div>
          </div>
        </div><!-- End Bordered Tabs Justified -->

      </div>
    </div>
@endsection