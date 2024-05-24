@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">User Details</h1>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Name:</strong> {{ $user->name }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Contact:</strong> {{ $user->contact }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Address:</strong> {{ $user->address }}
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 mb-10">
            <a href="{{ route('users.index') }}" class="btn btn-primary" style="font-size: 20px;">Back to User List</a>
        </div>
    </div>
    <link href="{{ asset('css/user-management.css') }}" rel="stylesheet">
@endsection
