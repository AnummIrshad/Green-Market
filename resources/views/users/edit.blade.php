@extends('layouts.app')

@section('content')
   
        <div class="user-management-form">
            <h1 class="mb-4">Update User</h1>

            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-right">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control custom-input" value="{{ $user->name }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label text-right">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" class="form-control custom-input" value="{{ $user->email }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contact" class="col-sm-2 col-form-label text-right">Contact:</label>
                    <div class="col-sm-10">
                        <input type="text" name="contact" id="contact" class="form-control custom-input" value="{{ $user->contact }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label text-right">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" id="address" class="form-control custom-input" value="{{ $user->address }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Back to User List</a>
                    </div>
                </div>
            </form>
        </div>
    
    <link href="{{ asset('css/user-management.css') }}" rel="stylesheet">
@endsection
