@extends('admin.master')

@section('title', 'Doctors | ' . env('APP_NAME'))

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">Add New Doctor</h1>
        <a href="#" onclick="history.back()" class="btn btn-outline-primary px-5">Return Back</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" />
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" />
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" autocomplete="new-password" />
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" />
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" />
        </div>

        <div class="mb-3">
            <label>Bio</label>
            <textarea name="bio" class="form-control" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control">
                <option selected disabled>Select</option>
                @foreach ($departments as $dep)
                    <option value="{{ $dep->id }}">{{ $dep->name_en }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Add</button>
    </form>
@stop
