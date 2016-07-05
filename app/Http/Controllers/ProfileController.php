<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    
    public function index($id){
        
        $userDetail = \App\User::select('users.*', 'user_other_details.*')
                    ->join('user_other_details', 'user_other_details.user_id', '=', 'users.id')
                    ->where('users.id','=',$id)
                    ->get();
        
        if(count($userDetail)) {
            $userRowsets = $userDetail->toArray();
        }else {
            $userRowsets = false;
        }
        
        return view('profile', ['userDetail' => $userRowsets,'userId'=>$id]);
    }
    
    public function changePassword($id){
        return view('change-password',['id'=>$id]);
    }
    
    public function resetPassword(Request $request, $id){
        echo "ID : " .$id."<br>";
        dd($request->request);
    }

    public function updateUser(Request $request,$id){

        $name = $request->data['name'];
        $userName = $request->data['user'];
        $email = $request->data['email'];
        $designation = $request->data['designation'];
        $number = $request->data['phone_number'];
        $address = $request->data['address'];
        $eid = $request->data['eid'];
        $hod = $request->data['hod'];
        $lead = $request->data['lead'];
        $skype = $request->data['skype'];
        $facebook = $request->data['facebook'];
        $git = $request->data['git'];
        $blog = $request->data['blog'];


        $user = \App\User::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->user_name = $userName;
        $user->save();

        $userid = \App\userOtherDetail::select('id')->where('user_id','=',$id)->limit(1)->get();
        $id = $userid->toArray();

        $userOtherDetail = \App\userOtherDetail::find($id[0]['id']);

        $userOtherDetail->designation = $designation;
        $userOtherDetail->skype_id = $skype;
        $userOtherDetail->address = $address;
        $userOtherDetail->phine_number = $number;
        $userOtherDetail->employee_id = $eid;
        $userOtherDetail->team_lead = $lead;
        $userOtherDetail->hod = $hod;
        $userOtherDetail->facebook_link = $facebook;
        $userOtherDetail->github_link = $git;
        $userOtherDetail->web_link = $blog;
        $userOtherDetail->save();

        return "success";
    }
}
