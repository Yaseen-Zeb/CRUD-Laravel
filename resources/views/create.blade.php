@extends('layout')

@section('title', 'Add New Student')

@section('content')
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Add New Student</h3>
                        <a href="/" class="btn btn-success float-right">All Students</a>
                    </div>
                    <div class="card-body">
                        <form id="add_student" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Name</label>
                                <div class="col-sm-6">
                                    <input required type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Class</label>
                                <div class="col-sm-6">
                                    <select name="class" class="form-control">
                                        <option value="" selected disabled selected >Select Class</option>
                                        @foreach($classes as $class_list)
                                            <option value="{{$class_list->id}}">{{$class_list->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Age</label>
                                <div class="col-sm-6">
                                    <input required type="number" class="form-control" name="age">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right">Gender</label>
                                <div class="col-sm-3">
                                    <input required type="radio" name="gender" value="m" checked=""> Male
                                    <input required type="radio" name="gender" value="f"> Female
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mx-auto py-1 alert alert-danger error  w-100 text-center d-none" role="alert"></div>
                                <div class="col-sm-6 mx-auto py-1 alert alert-success success w-100 text-center d-none" role="alert"></div>
                                <div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-success" value="Add">
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