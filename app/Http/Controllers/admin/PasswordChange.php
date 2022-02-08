<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class PasswordChange extends Controller
{
    public function ChangePas($id){
        
        $data['user'] = User::where('id',$id)->first();
        // return $data['user'];

        return view('backend.auth.password_change',$data);
    }

    public function ChangePassUpdate(Request $request){

        $request->validate([
            'password'=>'min:8',
            'confirm_passowrd'=>'required_with:password|same:password'
        ]);

        $UserId = $request->User_id;
        
        $change = User::where('id',$UserId)->first();
        $change->password = bcrypt($request->password);
        $change->save();

        $noti = array(
            'message'=>'Your Password Successfully Change.',
            'alert-type'=>'success'
        );

        return redirect()->route('home')->with($noti);
       
    }
}
