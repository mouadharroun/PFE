@extends('layouts.TeacherBody')
@section('content')
<div class="pagetitle">
      <h1>Form Editors</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add Text Question</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-md-6">
           
                  
                  <div class="card">
                        <div class="card-body">
                              <h5 class="card-title">Add the Question Text</h5>
                              <form method="POST" action="{{ route('addTextQuestion') }}" enctype="multipart/form-data" id="add-text-qu-form">
                                    @csrf
                                    <table class="table table-borderless">
                                    <tr>
                                          <td colspan="2">
                                                <label for="exam-input-id" class="form-label">l'examen:</label>
                                                <select name="exam" class="form-control form-select" id="exam-input-id">
                                                <option value="">Choose an Exam please</option>
                                                <option value="">Exam 1</option>
                                                <option value="">Exam 2</option>
                                                <option value="">Exam 3</option>
                                                </select>
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>
                                                <!-- Quill Editor Default -->
                                                <label for="exam-input-id" class="form-label">La Question:</label>
                                                <div class="quill-editor-full" style="height: 100px">
                                                    <div id="editor" style="display: none;"></div>
                                                </div>
                                              
                                                
                  
                                               
                                                <!-- End Quill Editor Default -->  
                                    </td>
                                        
                                          
                                    </tr>
                                          <tr>
                                                <td>
                                                      <div class="col-sm-10 text-center">
                                                            <button id="submit-btn" class="btn btn-primary" type="button">Save</button>
                                                      </div>
                                                      
                                                </td>
                                          </tr>
                                    </table>  
                              </form>                      
                        </div>
                       

                  </div>
         </div>
           

      

        </div>

      </div>

    

@endsection