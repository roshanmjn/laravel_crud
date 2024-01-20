<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    //Get By Id
    public function index(Request $request, ?int $id=null){        
        if($id==null)
           return view('users.index',['id'=>'No such user.']);
        return $this->userService->index($id);
    }

    // List
    public function list(){
        return $this->userService->list();        
    }
   
    //login
    public function login(Request $request){
        $credentials = $request->only('email','password');        
        $user = User::where('email',$credentials['email'])->first();       
        if($user && $user->password === $credentials['password']){
            $token = JWTAuth::fromUser($user);
            $cookie = Cookie::make('access_token',$token,60);   
            return response()->json(['status'=>true,'message'=>'Login success.'],200)->cookie($cookie);

        }
        return response()->json(['status' =>false, 'message'=>'Invalid credentials'], 401);

    }
    // Create
    public function create(Request $request) {         
        $createResult =  $this->userService->create($request);
        dd($createResult);
    }

    // Get Update data
    public function edit($id)
    {
        return $this->userService->edit($id);
    }

    // Update data By Id
    public function update(Request $request,$id)
    {
        return $this->userService->update($request,$id);      
    }

    //Delete By Id
    public function destroy($id)
    {
        return $this->userService->destroy($id);
    }
    //logout By Id
    public function logout()
    {
        $cookie = Cookie::forget('access_token');
        return redirect()->to('/login')->cookie($cookie);
    }

}
