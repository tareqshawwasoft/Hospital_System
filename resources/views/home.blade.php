@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                        Accept appointment


                        @else{{-- This is for the user --}}
                        <!-- here we write the code for the user Start -->
                        <div class="container">
                            <form action="{{route('appointment.store')}}" method="post" class="form-control">
                                @csrf
                                <h2 class="text-center fw-bold my-4">Make an Appointment</h2>
                                <div class="mb-3">
                                    <label class="my-2">Select Doctor </label>
                                    <select name="doctor_id" class="form-control">
                                        <option selected disabled>Select</option>
                                        @foreach ($doctors as $doc)
                                            <option value="{{ $doc->id }}">{{ $doc->user->name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="my-2">Choose date and time for the appointment </label>
                                    <input type="datetime-local" min="{{ date('Y-m-d\TH') }}"
                                        max="{{ date('Y-m-d\TH:i:s', strtotime(date('Y-m-d\TH:i:s')) + 60 * 3600 * 24) }}"
                                        name="dob" class="form-control mb-5" placeholder="Your Date">
                                        <h5 mb-5> The Price on this appointment will be 100 NIS payed upon arrival</h3>
                                    <input type="submit" name="submit" class="form-control btn-success"
                                        placeholder="Your Date">

                                </div>
                            </form>
                        </div>
                        <!-- here we write the code for the user Finish -->
                @endif



            </div>
        </div>
    </div>
@endsection
