@extends('admin.master')

@section('title', 'Patients | ' . env('APP_NAME'))

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">Add New Patient</h1>
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

    <form action="{{ route('admin.patient.store') }}" method="POST" >
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
            <label>Insurance Number</label>
            <input type="text" name="insurance_number" class="form-control" />
        </div>



        <div class="mb-3">
            <label>Date of Birth</label>
            <input name="dob" type="date" class="form-control" rows="5"/>
        </div>



        <button class="btn btn-success">Add</button>
    </form>
@stop
