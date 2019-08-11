<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function getLogin() {
    	return view('login');
    }
    public function postLogin(Request $request) {
    	$rules = [
    		'email' =>'required|email',
    		'password' => 'required|min:8'
    	];
    	$messages = [
    		'email.required' => 'Email không được để trống.',
    		'email.email' => 'Email không đúng định dạng',
    		'password.required' => 'Mật khẩu không được để trống',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
            return response()->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 200);
    	} else {
    		$email = $request->input('email');
    		$password = $request->input('password');

    		if( Auth::attempt(['email' => $email, 'password' =>$password], $request->has('remember'))) {
                return response()->json([
                    'error' => false,
                    'message' => 'success'
                ], 200);
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không chính xác']);
                return response()->json([
                    'error' => true,
                    'message' => $errors
                ], 200);
    		}
    	}
    }
}