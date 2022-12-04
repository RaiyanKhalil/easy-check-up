<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function patientDash(){
        if(  !Auth::user() || Auth::user()->role_id!==1) return back();
        $viewData = array();
        $viewData['user'] = Auth::user();

        $appts = array();

        $myAppts = DB::table('appointments')->where('user_id', Auth::user()->id)->get();
        foreach ($myAppts as $a) {
            $doctor = Doctor::findorFail($a->doctor_id);
            $a->doctor = $doctor;
            $appts[] = $a;
        }
        $viewData['appointments'] = $appts;


        return view('dashboard.template')->with('viewData', $viewData);
    }

    public function docDash(){
        if( !Auth::user() ||  Auth::user()->role_id!==2) return back();
        
        $viewData = array();
        $viewData['user'] = Auth::user();

        $doc = DB::table('doctors')->where('email', Auth::user()->email)->first();

        $myAppts = DB::table('appointments')->where('doctor_id', $doc->id)->get();
        $appts = array();
        foreach ($myAppts  as $a) {
            $patient = User::findorFail($a->user_id);
            $a->patient= $patient;
            $appts[] = $a;
        }
        $viewData['appointments'] = $appts;


        return view('dashboard.template')->with('viewData', $viewData);
    }
}
