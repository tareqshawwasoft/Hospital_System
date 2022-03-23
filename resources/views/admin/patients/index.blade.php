@extends('admin.master')

@section('title', 'Patients | ' . env('APP_NAME'))

@section('styles')
<style>
    .table td,
    .table th {
        vertical-align: middle
    }
</style>
@stop

@section('content')


    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">All Patients</h1>
        <a href="{{ route('admin.patient.create') }}" class="btn btn-outline-primary px-5">Add New</a>
    </div>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif

    <table class="table table-hover table-striped table-bordered">
        <tr class="bg-dark text-white">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date of Birth</th>
            <th>Insurance</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        @forelse ($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->user->name }}</td>
                <td>{{ $patient->user->email }}</td>
                <td>{{ $patient->user->phone }}</td>
                <td>{{ $patient->dob}}</td>
                <td>{{ $patient->insurance_number}}</td>
                <td>
                    {{ $patient->created_at->diffForHumans() }}
                </td>
                <td>
                    <form class="d-inline" action="{{ route('admin.patient.destroy', $patient->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align: center">No Data Found</td>
            </tr>
        @endforelse
    </table>

    {{ $patients->links() }}

@stop
