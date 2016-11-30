<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login(Request $r)
    {
      $response = [];

      $email = $r->input('email');
      $password = $r->input('password');

      $user = User::where('email',$email)->orWhere('password', bcrypt($password))->first();
      if (count($user)==0) {
        $response['success'] = 0;
        $response['message'] = "User tidak ditemukan / password salah!";
        return response()->json($response);
      }

      $response['error'] = FALSE;
      $response['message'] = "User ditemukan";
      $response['uid'] = $user->id;
      $response['user']['name'] = $user->name;
      $response['user']['email'] = $user->email;
      $response['user']['created_at'] = $user->created_at;
      $response['user']['updated_at'] = $user->updated_at;
      return response()->json($response);
    }
}
