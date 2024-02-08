<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class AdminController extends Controller
{

    public function index()
    {
        return view('backend.family.index');
    }

    public function emailVerification(Request $request)
    {
        $email = $request->email;
        $count = User::where('email',$email)->count();

        if($count > 0){
            return Response::json(['code' => '200', 'message' => 'email found in database']);
        }else{
            return Response::json(['code' => '404', 'message' => 'No email matched found in database']);
        }

    }

    public function Logout(){
        Auth::logout();
        return redirect('login');
    }





}
