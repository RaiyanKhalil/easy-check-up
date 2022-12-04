<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Auth;


class DoctorController extends Controller
{
 
    public function showDoctor($id)
    {         
      //  if(!Auth::user()) return redirect()->route('login');
        
        $doctor = Doctor::findorFail($id);

        $viewData = array();
        $viewData["doctor"] = $doctor;
        var_dump($viewData["doctor"]);

        return view('doctor.show')
        ->with('viewData',$viewData);  
      
    }

    public function  update(Request $formData, $id) {
        $doc =  Doctor::findorFail($id);
        $doc->fname = $formData->input('fname');
        
        $doc->fname = $formData->input('lname');

        $doc->email = $formData->input('email');

        $doc->speciality = $formData->input('speciality');

        $doc->dob = $formData->input('doctor_type');

        $doc->doc_office_location = $formData->input('address');
            
        $doc->update();
            return redirect()->route('dashboard-doctor');
    }

}
