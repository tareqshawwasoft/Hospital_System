@extends('layouts.app')

@section('content')

@section('styles')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 80px;
        }


        .container {

            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;

        }

        h5 {
            margin: 12px;
        }


        img {
            width: 10%;
            height: 60%
        }


        .card-title {
            text-align: center;
        }

        .card-department {
            text-align: center;
            font-size: 1rem;
        }

        .card-email {
            text-align: center;
            font-size: 1rem;
        }

    </style>
@stop

@if (session('msg'))
    <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
        {{ session('msg') }}

        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> --}}
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="container my-5 text-center">
                <h2> Hello {{ Auth::user()->name }}!</h2>
            </div>


            @if (Auth::user()->type == 'admin')

                {{-- This is for the admin --}}
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}
                        <a href="{{ route('admin.index') }}">GO to admin</a>
                    </div>
                @elseif (Auth::user()->type == 'doctor')
                    {{-- This is for the doctor --}}
                    {{-- Accept appointments --}}




                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('availabletime.store') }}" method="POST">
                        @csrf


                        <h3>Create Availabe times</h3>
                        <input type="hidden" value="{{ $doctors->where('user_id', Auth::user()->id)->first()->id }}"
                            name="doctor_id" class="form-control" />

                        <div class="mb-3">
                            <label>Price per hour</label>
                            <input type="number" required name="price" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Date</label>
                            <input type="date" required min="{{ date('Y-m-d') }}" name="date_of_arrival"
                                class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Time of arrival</label>
                            <input type="time" required name="time_of_arrival" min="08:00" max="11:59"
                                class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Time of departure</label>
                            <input type="time" required name="time_of_departure" min="14:00" max="18:00"
                                class="form-control" />
                        </div>





                        {{-- <div class="container mb-3">
                            <div class="container">
                                <input  type="radio" id="full_time" name="times_available" value="full time">
                            <label  for="full_time">Full time (8 AM - 5 PM)</label>
                            </div>
                            <div class="container">
                            <input type="radio" id="part_time" name="times_available" value="part time">
                            <label for="part_time">Part time (10 AM - 2 PM)</label>
                            </div></div> --}}

                        <button class="btn btn-success px-5" style="float: right">Add</button>
                    </form>

                    @else{{-- This is for the user --}}
                    <!-- here we write the code for the user Start -->
                    <div class="container">
                        <form action="{{ route('appointments.store') }}" method="post" class="form-control">
                            @csrf
                            <h2 class="text-center fw-bold my-4">Make an Appointments</h2>
                            <div class="mb-3">


                                    <select name="appointment_select" id="appointment_select">
                                    @foreach ($available as $ava)
                                    <option name="chosen_appointment_id" value="{{$ava->id}}">
                                               Doctor name: {{ $ava->doctor->user->name }}||
                                               Time: {{ $ava->date_from }}
                                        </option>
                                    @endforeach</select>

                                </div>

                            </div>

                            <input type="submit" class="btn btn-success" style=" align-content:center;" value=" Make Appointment" />
                        </form>


                    </div>
                    <!-- here we write the code for the user Finish -->
            @endif



        </div>
    </div>
</div>


@endsection
