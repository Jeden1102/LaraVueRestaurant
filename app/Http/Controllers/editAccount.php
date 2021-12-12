<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class editAccount extends Controller
{
    public function general(Request $req){
        $fields = $req->validate([
            'name'=>'required|unique:users',
            'email'=>'required|unique:users,email',
        ]);
        $id = $req->id;
        $user = User::where('id',$id)->update([
            'email'=>$req->email,
            'name'=>$req->name
        ]);
        $edited = User::where('id',$id)->first();
        $response = [
            'user'=>$edited,
            'token'=>$req->token,
            'info'=>"Infomartion succesfully changed!"
        ];
        return response($response,201);
    }
    public function deliveryInfo(Request $req){
        $fields = $req->validate([
            'city'=>'required',
            'street'=>'required',
            'number'=>'required',
            'phone'=>'required'
        ]);
        $id = $req->id;
        $user = User::where('id',$id)->update([
            'city'=>$req->city,
            'street'=>$req->street,
            'number'=>$req->number,
            'phone'=>$req->phone
        ]);
        $edited = User::where('id',$id)->first();
        $response = [
            'user'=>$edited,
            'token'=>$req->token,
            'info'=>"Infomartion succesfully changed!"
        ];
        return response($response,201);
    }
    public function pwdChange(Request $req){

        $fields = $req->validate([
            'password'=>'required|string',
        ]);
        //check email
        $user = User::where('id',$req->id)->first();
        //check pwd
        if(!$user || !Hash::check($req->oldPassword,$user->password)){
            $response = [
                'message'=>"Upss...your credentials didn't matched our records. Try Again!",
            ];
            return response($response,401);
        }
        User::where('id',$req->id)->update([
            'password'=>bcrypt($req->password)
        ]);
        $response = [
            'info'=>"Password succesfully changed!"
        ];
        return response($response,201);
    }
}
