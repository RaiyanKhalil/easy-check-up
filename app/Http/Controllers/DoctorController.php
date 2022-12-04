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

        return view('doctor.show')
        ->with('viewData',$viewData);  
      
    }

}
