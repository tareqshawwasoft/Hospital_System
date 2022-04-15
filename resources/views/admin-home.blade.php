@extends('layouts.app')
@section('content')
@section('styles')
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
        </div>
    </div>
</div>


@endsection
