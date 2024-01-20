<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\User\UserService;


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
        $data = $this->userService->login($credentials);
        // return response()->json($data);
    }
    // Create
    public function create(Request $request) {         
        return $this->userService->create($request);
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

}
