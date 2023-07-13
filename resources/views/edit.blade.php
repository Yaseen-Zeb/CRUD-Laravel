@extends('layout')

@section('title', 'Edit Student')

@section('content')
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Edit Student</h3>
                        <a href="/" class="btn btn-success float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form id="update_student" class="form-horizontal">
                            <input required type="hidden" id="sid" class="form-control" name="" value="{{$student->id}}">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Name</label>
                                <div class="col-sm-6">
                                    <input required type="text" class="form-control" name="name" value="{{$student->student_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Class</label>
                                <div class="col-sm-6">
                                    <select name="class" class="form-control">
                                        <option value="" selected disabled selected >Select Class</option>
                                        @foreach($classes as $class_list)
                                            @php $selected = ''; @endphp
                                            @if($student->student_class == $class_list->id)
                                            @php $selected = 'selected'; @endphp
                                            @endif
                                            <option value="{{$class_list->id}}" {{$selected}} >{{$class_list->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Age</label>
                                <div class="col-sm-6">
                                    <input required type="number" class="form-control" name="age" value="{{$student->student_age}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Gender</label>
                                <div class="col-sm-3">
                                    <input required type="radio" {{($student->student_gender == 'm') ? 'checked' : '';}} name="gender" value="m"> Male
                                    <input required type="radio" {{($student->student_gender == 'f') ? 'checked' : '';}} name="gender" value="f"> Female
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mx-auto py-1 alert alert-danger error  w-100 text-center d-none" role="alert"></div>
                                <div class="col-sm-6 mx-auto py-1 alert alert-success success w-100 text-center d-none" role="alert"></div>
                                <div class="col-sm-12 text-center">
                                    <input  type="submit" class="btn btn-success" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection