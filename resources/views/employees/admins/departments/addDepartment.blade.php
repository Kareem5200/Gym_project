@extends('employees.layouts.navbar')
@section('title')
<title>Add Department</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/employees_css/addDepartment.css') }}">
@endsection

@section('content')



 <div class="container row">
    <form action="{{ route('employees.createDepartment') }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Department</label>
            <input type="text" name="name" class="form-control" id="email" placeholder="Department" value="{{ old('name') }}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="period" class="form-label">Period</label>
            <input type="text" name="period" class="form-control" id="password" placeholder="Period" value="{{ old('period') }}">
        </div>
        @error('period')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file"  name="image" id="formFile">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-success"> Create </button>
    </form>
 </div>
@endsection
