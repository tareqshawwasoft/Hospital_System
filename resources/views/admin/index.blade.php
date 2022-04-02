@extends('admin.master')

@section('content')
@section('styles')
    <style>
        #title {
            color: black;
            font-weight: bold;
        }

        #numbers {
            font-weight: bold;
        }

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
<!-- Page Heading -->
<h1 class="h3 mb-4 text-center">Website Statistics</h1>
<div class="container">
    <div class="grid-container">


        <div class="card" style="width: 15rem; height: 8rem;">
            <div class="card-body">
                <h5 id="title" class="card-title text-center mb-3">Patients</h5>
                <div class="container" style="align-content: center;">
                    <h6 class="d-flex justify-content-center"><span id="numbers">{{$patients}}</span></h6>
                </div>
            </div>

        </div>
        <div class="card" style="width: 15rem; height: 8rem;">
            <div class="card-body">
                <h5 id="title" class="card-title text-center mb-3">Doctors</h5>
                <div class="container" style="align-content: center;">
                    <h6 class="d-flex justify-content-center"><span id="numbers">{{$doctors}}</span></h6>
                </div>
            </div>

        </div>
        <div class="card" style="width: 15rem; height: 8rem;">
            <div class="card-body">
                <h5 id="title" class="card-title text-center mb-3">Admins</h5>
                <div class="container" style="align-content: center;">
                    <h6 class="d-flex justify-content-center"><span id="numbers">{{$admins}}</span></h6>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
