<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jerapah;

class ContactController extends Controller
{
    public function get(Request $r)
    {
    	$id = $r->input('id');
    	$response = [];
    	$key = Jerapah::all();

    	if (count($key)==0) {
    		$response['success'] = 0;
    		$response['message'] = "Data Kosong";
    		$e[0] = array('id' => null,
    					'user_id' => null,
    					'name' => null,
    					'number' =>null,
    					'email' => null,
    					'created_at' => null,
    					'updated_at' => null);
    		$response['belajar'] = $e;
    		return response()->json($response);

    	}

    	$response['success'] = 1;
    	$response['message'] = "Berhasil mengambil data";
    	$response['belajar'] = $key;
    	return response()->json($response);
    }

    public function add($name, $number, $email)
    {
    	$response = [];

    	$data = new Jerapah;
    	$data->name = $name;
    	$data->number = $number;
    	$data->email = $email;
        $data->user_id = 1;
    	$data->save();

    	$response['success'] = 1;
    	$response['message'] = "Berhasil menambah data";
    	return response()->json($response);
    }

    public function modify($id, $name, $number, $email)
    {
    	$response = [];

    	$check = Jerapah::find($id);
    	if (!$check) {
    		$response['success'] = 0;
    		$response['message'] = "Data tidak ditemukan";
    		return response()->json($response);
    	}

    	$data = Jerapah::find($id);
    	$data->name = $name;
    	$data->number = $number;
    	$data->email = $email;
    	$data->save();

    	$response['success'] = 1;
    	$response['message'] = "Berhasil merubah data";
    	return response()->json($response);
    }

    public function destroy($id)
    {
    	$response = [];

    	$check = Jerapah::find($id);
    	if (!$check) {
    		$response['success'] = 0;
    		$response['message'] = "Data tidak ditemukan";
    		return response()->json($response);
    	}

    	$data = Jerapah::find($id);
        $data->delete();
    	$response['success'] = 1;
    	$response['message'] = "Berhasil menghapus data";
    	return response()->json($response);	
    }
}
