<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\DB;
use App\YuridicheskoyeModel;
use App\FizicheskoyeModel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   //  protected $redirectTo = RouteServiceProvider::HOME;
       protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'lastname'              => ['required', 'string', 'max:255'],
            'phone'                 => ['required', 'string', 'max:255'],
            'password_confirmation' => ['required', 'string', 'max:255'],
            'g-recaptcha-response'  => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


         $User = User::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'last_name'    => $data['lastname'],
            'phone_number' => $data['phone'],
            'password'     => Hash::make($data['password']),
            'region_id'    => 82,
        ]);

            $Fizicheskoye   = new FizicheskoyeModel();
            $Yuridicheskoye = new YuridicheskoyeModel();

            $Fizicheskoye->user_id = $User->id;
            $Fizicheskoye->save();

            $Yuridicheskoye->user_id = $User->id;
            $Yuridicheskoye->save();

                 return $User;
    }
}
