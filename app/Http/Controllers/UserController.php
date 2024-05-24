<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model at the top of your controller





class UserController extends Controller
{


public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'contact' => 'required|string|max:255',
        'address' => 'required|string|max:255',
    ]);

    $user->update($request->all());

    return redirect()->route('users.index')->with('status', 'User updated successfully');
}








    public function index()
{
    $users = User::all(); // Retrieve all users from the database
    return view('users.index', compact('users'));
}
    


public function show(User $user)
{
    return view('users.show', compact('user'));
}



public function create()
{
    return view('users.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8', // You can adjust the validation rules as needed
        'contact' => 'required',
        'address' => 'required',
    ]);

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->contact = $request->input('contact');
    $user->address = $request->input('address');
    $user->save();

    return redirect()->route('users.index')->with('success', 'User added successfully');
}



public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}

}


