@extends('admin.master')

@section('title', 'Doctors | ' . env('APP_NAME'))

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
        <h1 class="m-0">All Doctors</h1>
        <a href="{{ route('admin.doctors.create') }}" class="btn btn-outline-primary px-5">Add New</a>
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
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        @forelse ($doctors as $doc)
            <tr>
                <td>{{ $doc->id }}</td>
                <td><a href="{{ asset('uploads/doctors/'.$doc->image) }}" target="_blank"><img width="120" src="{{ asset('uploads/doctors/'.$doc->image) }}" alt=""></a></td>
                <td>{{ $doc->user->name }}</td>
                <td>{{ $doc->user->email }}</td>
                <td>{{ $doc->user->phone }}</td>
                <td>{{ $doc->department->name_en }}</td>
                <td>
                    {{ $doc->created_at->diffForHumans() }}
                </td>
                <td>
                    <form class="d-inline" action="{{ route('admin.doctors.destroy', $doc->id) }}" method="POST">
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

    {{ $doctors->links() }}

@stop
