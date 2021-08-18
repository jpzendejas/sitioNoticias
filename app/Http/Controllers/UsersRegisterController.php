<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use Illuminate\Support\Facades\Hash;

class UsersRegisterController extends Controller
{
    public function registerUser(Request $request){
      $rules = [
        'name'=>'required',
        'email'=>'required',
        'password'=>'required'];
        $this->validate($request, $rules);
        $employeeid = $request->employeeid;

        $employee = Employee::where('idemployee',$employeeid)->get();
        if($employee) {
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->employeeid = $request->employeeid;
          $user->save();
        }else {
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->save();
        }dd($request->all());
    }
}
