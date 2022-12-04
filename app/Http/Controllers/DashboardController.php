<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function patientDash(){
        $viewData = array();
        // $viewData['title'] = "All Appointments";
        $viewData['user'] = Auth::user();
        // $viewData['appointments'] = Appointment::all();

        $appts = array();
        foreach (Appointment::all() as $a) {
            $doctor = User::findorFail($a->user_id);
            $a['doctor'] = $doctor;
            // array_push($appts,$a)
            $appts[] = $a;
        }
        $viewData['appointments'] = $appts;


        return view('dashboard.template')->with('viewData', $viewData);
    }

    public function docDash(){
        $viewData = array();
        // $viewData['title'] = "All Appointments";
        $viewData['appointments'] = Appointment::all();

        return view('dashboard.doctor')->with('viewData', $viewData);
    }
}
