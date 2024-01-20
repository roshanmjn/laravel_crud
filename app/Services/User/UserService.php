<?php

namespace App\Services\User;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService{

    public function index($id = null)
    {
        if ($id == null) {
            return view('users.index', ['error' => 'No such user.']);
        }

        $user = User::find($id);

        if (!$user) {
            return view('users.index', ['error' => 'No such user.']);
        }

        return view('users.index', ['user' => $user]);
    }

    public function list(){
        $users = User::all();
        return view('users.list', ['users' => $users]);
    }

    public function login($credentials){
        $user = User::where('email', $credentials['email'])->first();
        dump($user->password);
        // if (!$user) {
        //     return response()->json(['error' => 'Invalid credentials'], 401);
        // }

        // if (password_verify($credentials['password'], $user->password)) {
           
        // }

        // return response()->json(['error' => 'Invalid credentials'], 401);
    }

    // Create
    public function create($body){
        
        $validated = $body->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'profile_picture'=>'nullable|string'
        ]);

        $validated['profile_picture'] = $validated['profile_picture'] ?? 'https://random.imagecdn.app/500/10';

        // dd($validated['profile_picture']);
        $newUser = User::create($validated);
        return redirect()->route('user.list');
    }

    //Update getter
    public function edit($id)
    {
        $user = User::find($id);
    
        return view('users.edit', compact('user'));
    }

    //Update setter
    public function update($body,$id)
    {
        $user = User::find($id);

        if (!$user) {
            // return redirect()->route('users.index')->with('error', 'User not found.');
            return view('users.index',['error'=>'No such user.']);
        }

        $data = $body->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        $user->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => request('password')
        ]);

        // return redirect()->route('users.index')->with('success', 'User updated successfully.');
        return view('users.index',['success'=>$user]);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            // return redirect()->route('users.index')->with('error', 'User not found.');
            return view('users.index',['error'=>'No such user.']);
        }

        $user->delete();

        return redirect()->route('user.list');
    }
}