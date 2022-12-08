<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class DoctorController extends Controller
{
 
    public function showDoctor($id)
    {         
      //  if(!Auth::user()) return redirect()->route('login');
        
        $doctor = Doctor::findorFail($id);

        $viewData = array();
        $viewData["doctor"] = $doctor;

        return view('doctor.edit')->with('viewData',$viewData);  
      
    }

    public function  update(Request $formData, $id) {
        $doc =  Doctor::findorFail($id);

        $doc->f_name = $formData->input('fname');
        
        $doc->l_name = $formData->input('lname');

        $doc->email = $formData->input('email');

        $doc->phn_num = $formData->input('contact');

        $doc->doc_type = $formData->input('doctor_type');

        $doc->doc_office_location = $formData->input('address');

        $longLat = LocationController::getLongLat($formData->input('address'));
       //updating the location pointers too
        $doc->doc_lat = $longLat[0];
        $doc->doc_long= $longLat[1];

            
        $doc->update();

        
    //    $user = (object) DB::table('users')->where('email', Auth::user()->email)->first();
        $user = User::where('email', Auth::user()->email)->first();
        

        $user->fname = $formData->input('fname');
        
        $user->lname = $formData->input('lname');

        $user->email = $formData->input('email');

        $user->contact = $formData->input('contact');

        $user->address = $formData->input('address');
        
        $user->update();

            return redirect()->route('dashboard-doctor');
    }

}
