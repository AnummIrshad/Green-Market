@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <h1 class="decorated-heading ">User Management</h1>
        

        
        <a href="{{ route('users.create') }}" class="btn btn-primary  ml-6 decorated-button">Add New User</a>
        <br>
        
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->contact }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <a href="{{ route('users.show', $user) }}" class="btn btn-info mr-2">View</a>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning mr-2">Update</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mr-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <link href="{{ asset('css/user-management.css') }}" rel="stylesheet">
@endsection