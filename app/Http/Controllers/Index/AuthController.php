<?php

namespace App\Http\Controllers\Index;

use App\Models\Callback;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yuansir\Toastr\Facades\Toastr;

class AuthController extends Controller
{
    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'last_name' => 'required|min:3|max:50',
            'first_name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:9|max:11',
            'password' => 'required|confirmed',
        ]);

        $result['success'] = FALSE;

        if ($validator->fails()) {
            $messages = $validator->errors();
            $result['errors'] = $messages->all();

            return response($result);
        }
        $inputs = $request->all();

        $user = new User();
        $user->first_name = $inputs['first_name'];
        $user->last_name = $inputs['last_name'];
        $user->phone = $inputs['phone'];
        $user->email = $inputs['email'];
        $user->password= Hash::make($inputs['password']);
        $user->save();

        $userData = array(
            'email' => $inputs['email'],
            'password' =>$inputs['password']
        );
        if (Auth::attempt($userData)){
            $result['success'] = TRUE;
            $result['message'] = $inputs['last_name'].' '.$inputs['first_name'];
        }
        return response($result);
    }

    public function logout()
    {
        if (Auth::check())
            Auth::logout();
        return redirect()->back();
    }

    public function login(Request $request)
    {
        $result['success'] = TRUE;
        $userData = array(
            'email' => $request->email,
            'password' =>$request->password
        );
        if (!Auth::attempt($userData)) {
            $result['error'] = 'Неправильный логин или пароль';
            $result['success'] = FALSE;
        }else{
            $result['message'] = Auth::user()->last_name.' '.Auth::user()->first_name;
        }
        return response()->json($result);
    }

    public function callback(Request $request)
    {
        $result['success'] = FALSE;
        $result['message'] = 'Заполняйте корректными данными';
        $inputs = $request->all();
        if (count($inputs['name']) && count($inputs['phone'])){
            Callback::create([
               'name'=>$inputs['name'],
                'phone'=>$inputs['phone']
            ]);
        $result['success'] = TRUE;
        $result['message'] = 'Ваш запрос успешно отправлен';
        }
        return $result;
    }
}
