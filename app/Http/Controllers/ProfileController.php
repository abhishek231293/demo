<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    
    public function index($id){
        
        $userDetail = \App\User::select('users.*', 'user_other_detail.*')
                    ->join('user_other_detail', 'user_other_detail.user_id', '=', 'users.id')
                    ->where('users.id','=',$id)
                    ->get();
        $userRowsets = $userDetail->toArray();
        
        return view('profile', ['userDetail' => $userRowsets]);
    }
}
