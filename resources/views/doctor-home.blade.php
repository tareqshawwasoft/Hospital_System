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



                        <button class="btn btn-success px-5" style="float: right">Add</button>
                    </form>





        </div>
    </div>
</div>


@endsection
