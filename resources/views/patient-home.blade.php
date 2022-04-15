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


                    <!-- here we write the code for the user Start -->
                    <div class="container">
                        {{-- <form action="{{ route('appointments.store') }}" method="post" class="form-control">
                            @csrf
                            <h2 class="text-center fw-bold my-4">Make an Appointments</h2>
                            <div class="mb-3">


                                    <select name="appointment_select" id="appointment_select">
                                    @foreach ($available as $ava)
                                    <option name="chosen_appointment_id" value="{{$ava->id}}">
                                               <div>Doctor name: {{ $ava->doctor->user->name }}||
                                                Time: {{ $ava->date_from }}</div>
                                        </option>
                                    @endforeach</select> --}}
                                    {{-- end209302903902903920309293029309203902903929302903920930290390293092030309029302932930903 --}}

                                    <table class="table table-hover table-striped table-bordered">
                                        <tr class="bg-dark text-white">
                                            <th style="color: white">Doctor Name</th>
                                            <th style="color: white">Time</th>
                                            <th style="color: white">Actions</th>
                                        </tr>

                                        @forelse ($available as $ava)
                                            <tr>
                                                <td>{{ $ava->doctor->user->name  }}</td>
                                                <td>{{ $ava->date_from }}</td>

                                                <td>
                                                    <form class="d-inline" action="{{ route('appointments.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="available_id" value="{{$ava->id}}">
                                                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-success">Make Appointment</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" style="text-align: center">No Data Found</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                    {{-- end209302903902903920309293029309203902903929302903920930290390293092030309029302932930903 --}}


                                </div>

                            </div>

                            <input type="submit" class="btn btn-success" style=" align-content:center;" value=" Make Appointment" />
                        </form>
                        <div class="container my-5">
                            <h2> My Appointments</h2>
                            <h4> {{$appointment->id}}</h4>
                        </div>

                    </div>
                    <!-- here we write the code for the user Finish -->



        </div>
    </div>
</div>


@endsection
