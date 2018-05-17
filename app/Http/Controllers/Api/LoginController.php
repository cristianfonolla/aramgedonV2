<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use DB;
use Log;

class LoginController extends Controller
{
    private function sendSMS($phone, $validate)
    {
        Nexmo::message()->send([
            'to' => $phone,
            'from' => $phone,
            'text' => 'Your autentification code is: '.$validate
        ]);
    }

	public function handleUpdateUser(Request $request) 
	{
		try {
    		DB::beginTransaction();
            $validate = rand (100000, 999999);
            $request->merge(['validate' => $validate]);
    		$user = User::create($request->all());
    		DB::commit();
    		return response()->json(['redcode' => 0, 'user_id' => $user->id]);
    	} catch (Exception $e) {
            DB::rollback();
            Log::error('Error: '.$e->getMessage().' ******* Falla a '.$e->getFile().' ------ En la linea '.$e->getLine());
            return response()->json(['redcode' => 1]);
    	}
	}

    public function handleLogin(Request $request)
    {
        if (auth()->guard('user')->attempt(array('email' => $request->input('email'), 'password' => $request->input('password')))) {
            if (!auth()->guard('user')->user()->validated) {
                auth()->guard('user')->logout();
                return response()->json(['redcode' => 2]);
            } else {
                return response()->json(['redcode' => 0, 'user_id' => auth()->guard('user')->user()->id]);
            }
        }else {
            return response()->json(['redcode' => 1]);
        }
    }

    public function logout() 
    {
        auth()->guard('user')->logout();
        return response()->json(['redcode' => 0]);
    }
}
