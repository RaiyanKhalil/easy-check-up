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
        if( !Auth::user() || Auth::user()->role_id!==1) return back();
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
        // $viewData['doctor'] = Doctor::findorFail(Auth::user()->id);

        // $doc = DB::table('doctors')->where('email', Auth::user()->email)->first();
        $doc = Doctor::query()->where('email', Auth::user()->email)->first();
        // var_dump($doc);
        $viewData['doctor'] = (object) $doc;

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

    public function editUser($id){
        return view('dashboard.edit-user'); 
    }

    public function updateUser(Request $req){

        $user = User::findOrFail(Auth::user()->id);
        $user->fname = $req['fname'];
        $user->lname = $req['lname'];
        $user->address = $req['address'];
        $user->email = $req['email'];
        $user->contact = $req['contact'];
        $user->save();

        return redirect('/dashboard-jma-13');
    }
}
