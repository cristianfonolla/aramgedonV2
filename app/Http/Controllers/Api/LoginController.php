<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use DB;
use Log;
use Nexmo;

class LoginController extends Controller
{
    /**
    * Function for send SMS
    *
    * @param $phone  type string  Phone to send SMS
    * @param $validate  type integer  Code to send in SMS
    * @return 
    */
    private function sendSMS($phone, $validate)
    {
        Nexmo::message()->send([
            'to' => $phone,
            'from' => $phone,
            'text' => 'Your autentification code is: '.$validate
        ]);
    }

    /**
    * Function for create a new user
    *
    * @param $request  type Request  data to save
    * @return json
    */
	public function handleUpdateUser(Request $request) 
	{
		try {
    		DB::beginTransaction();
            $validate = rand (100000, 999999);
            $request->merge(['validate' => $validate]);
    		$user = User::create($request->all());
    		DB::commit();
            $this->sendSMS('34646595803', $validate);
    		return response()->json(['redcode' => 0, 'user_id' => $user->id]);
    	} catch (Exception $e) {
            DB::rollback();
            Log::error('Error: '.$e->getMessage().' ******* Falla a '.$e->getFile().' ------ En la linea '.$e->getLine());
            return response()->json(['redcode' => 1]);
    	}
	}

    /**
    * Function to login
    *
    * @param $request  type Request  user credentials
    * @return json
    */
    public function handleLogin(Request $request)
    {
        if (auth()->guard('user')->attempt(array('email' => $request->input('email'), 'password' => $request->input('password'), 'validated' => true))) {
            return response()->json(['redcode' => 0, 'user_id' => auth()->guard('user')->user()->id]);
        }else {
            return response()->json(['redcode' => 1]);
        }
    }

    /**
    * Function for logout
    *
    * @return json
    */
    public function logout() 
    {
        auth()->guard('user')->logout();
        return response()->json(['redcode' => 0]);
    }

    /**
    * Function for validate an user when enter a validate code
    *
    * @param $user  type integer  User id
    * @param $code  type integer  Code to validate woth db code
    */
    public function ValidateUser($user, $code) {
        try {
            $user = User::findOrFail($user);
            if ($user->validate == $code) {
                $user->validated = 1;
                $user->update();
                return response()->json(['redcode' => 0]);
            } else {
                $user->delete();
                return response()->json(['redcode' => 1]);
            }
            
        } catch (Exception $e) {
            Log::error('Error: '.$e->getMessage().' ******* Falla a '.$e->getFile().' ------ En la linea '.$e->getLine());
            return response()->json(['redcode' => 1]);
        }
    }
}
