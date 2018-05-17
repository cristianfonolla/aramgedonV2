<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ParameterUser;
use Exception;
use DB;
use Log;

class ParametersController extends Controller
{
    /**
    * Function for save a param data
    *
    * @param $request  type Request  Data to save
    * @return json
    */
    public function update(Request $request)
    {
    	try {
    		DB::beginTransaction();
            // $request->merge(['user_id' => auth()->guard('user')->user()->id]);
    		$register = ParameterUser::create($request->all());
    		DB::commit();
            return response()->json(['redcode' => 0]);
    	} catch (Exception $e) {
            DB::rollback();
            Log::error('Error: '.$e->getMessage().' ******* Falla a '.$e->getFile().' ------ En la linea '.$e->getLine());
            return response()->json(['redcode' => 1]);
    	}
    }

    /**
    * Function for get the parameter average from user
    *
    * @param $user  type integer  User id
    * @param $parameter  type integer  Parameter id
    * @return json
    */
    public function getData($user, $parameter)
    {
    	try {
            DB::beginTransaction();
    		$values = ParameterUser::where('parameter_id','=',$parameter)->
    								 where('user_id','=',$user)->
    								 pluck('value')->
                                     toArray();
            $suma = array_sum($values);
            $average = $suma / count($values);
            $average = number_format($average, 2, '.', '');
    		DB::commit();
    		return response()->json(['redcode' => 0, 'average' => $average]);
    	} catch (Exception $e) {
            Log::error('Error: '.$e->getMessage().' ******* Falla a '.$e->getFile().' ------ En la linea '.$e->getLine());
            return response()->json(['redcode' => 1]);
    	}
    }
}
