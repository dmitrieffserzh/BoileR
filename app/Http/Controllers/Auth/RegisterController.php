<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('guest');
    }


    protected function validator(array $data) {
        return Validator::make($data, [
            'username'  => ['required', 'string', 'min:3', 'max:15', 'unique:users', 'regex:/^[a-z0-9_]+$/u'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }


    protected function create(array $data) {
        // NEW USER
        $user = new User();
        $user->username = $data['username'];
        $user->email    = $data['email'];
        $user->password = Hash::make($data['password']);
        // NEW PROFILE
        if($user->save()) {
            $profile = new UserProfile();
            $profile->user_id = $user->id;
            if ($profile->save()) {
                return $user;
            }
        }

        $user->delete($user->id);

        return redirect('register')->with([
            'error_message' => 'Ошибка! Попробуйте снова!'
        ]);
    }


    protected function checkUserName(Request $request) {
        if(request()->ajax()) {
            $validator = Validator::make($request->all(),
                ['username' => ['required', 'string', 'min:3', 'max:15', 'unique:users,username', 'unique:users,route', 'regex:/^[a-z0-9_]+$/u']],
                ['required'     => trans('validation.username.required'),
                    'min'       => 'Минимальная длина 3 символа!',
                    'max'       => 'Мaксимальная длина 15 символов!',
                    'unique'    =>  trans("validation.username.unique"),
                    'regex'     => 'Разрешены символы a-z, 0-9 и _!']
            );
            if ($validator->passes())
                return response()->json(['success'=> true, 'error' => [''] ]);
            return response()->json(['success'=> false, 'error'=>$validator->errors()->all()]);
        }
        return abort(404);
    }


    protected function checkUserEmail(Request $request) {
        if(request()->ajax()) {
            $validator = Validator::make($request->all(),
                ['email'      => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/u'],],
                [ 'unique'    => 'Пользователь с этим E-mail уже зарегистрирован в системе!',
                    'regex'   => 'Разрешены символы a-z0-9_-.@']
            );
            if ($validator->passes())
                return response()->json(['success'=> true, 'error' => [''] ]);
            return response()->json(['success'=> false, 'error'=>$validator->errors()->all()]);
        }
        return abort(404);
    }
}
