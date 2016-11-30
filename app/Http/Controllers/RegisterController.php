<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
   public function register(Request $r)
    {
      $response = [];

      $name = $r->input('name');
      $email = $r->input('email');
      $password = bcrypt($r->input('password'));

      $check = User::where('email', $email);

      if (!$check) {
        $response['success'] = 0;
        $response['message'] = "Email telah terdaftar";
        return response()->json($response);
      }

      $user = new User();
      $user->name = $name;
      $user->email = $email;
      $user->password = $password;
      $user->save();

      $response['success'] = 1;
      $response['message'] = "Berhasil mendaftarkan akun";
      return response()->json($response);
    }
}
