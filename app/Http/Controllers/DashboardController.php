<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function patientDash(){
        $viewData = array();
        // $viewData['title'] = "All Appointments";
        $viewData['appointments'] = Appointment::all();

        return view('dashboard.template')->with('renderData', $viewData);
    }

    public function docDash(){
        $viewData = array();
        // $viewData['title'] = "All Appointments";
        $viewData['appointments'] = Appointment::all();

        return view('dashboard.doctor')->with('renderData', $viewData);
    }
}
