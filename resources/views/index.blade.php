@extends('layout')

@section('title', 'Students List')

@section('content')
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Students List</h3>
                        <a href="students/create" class="btn btn-success float-right">Add New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $row)
                                <tr class="row{{$row->id}}">
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->student_name}}</td>
                                    <td>{{$row->class_name}}</td>
                                    <td>{{$row->student_age}}</td>
                                    <td>
                                        @if($row->student_gender == 'm')
                                            {{ 'Male' }}
                                        @else
                                            {{ 'Female' }}
                                        @endif
                                    </td>
                                    <td><a href="{{url('students/'.$row->id.'/edit')}}" class="btn btn-dark">Edit</a></td>
                                    <td>
                                        <a href="javascript:void(0)" class="delete-student btn btn-danger" onclick="remove({{$row->id}})">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer">
                        {{ $students->links('pagination::bootstrap-4'); }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection