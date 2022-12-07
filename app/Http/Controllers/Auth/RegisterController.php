<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Doctor;

use App\Http\Controllers\LocationController;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
         /*   'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
*/
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        echo "<br/><br/><br/>";
        var_dump($data);
        $address = $data['street']. ', '.$data['city']. ', ' .$data['province']. ', Canada ' .$data['zipcode'];
        
        if($data['userId']==2)
        {
        $longLat = array();
        $longLat = LocationController::getLongLat($address);
       
        Doctor::create([
            'f_name' => $data['fname'],
            'l_name' => $data['lname'],
            'email' => $data['email'],
            'phn_num' => $data['contact'],
            'doc_type' => $data['doctor_type'],
            'doc_office_location' => $address,
            'doc_lat' => $longLat[0],
            'doc_long' => $longLat[1],
        ]);
            } 
          return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'role_id' => $data['userId'],
            'address' => $address,
            'password' => Hash::make($data['password']),
        ]);    
    
    }

    protected function showDoctorRegisterPage($id)
    {
        $viewData = array();
        $viewData["id"] = $id;

        return view('auth.register') -> with("viewData",$viewData);
    }

    protected function showUserRegisterPage($id)
    {
        $viewData = array();
        $viewData["id"] = $id;

        return view('auth.register') -> with("viewData",$viewData);
    }
    
}
