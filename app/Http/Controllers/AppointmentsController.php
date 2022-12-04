<?php
namespace App\Http\Controllers;
// use Illuminiate\Http\Request;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;
use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Http;
// $response = Http::get('http://192.168.0.62:1337/api/doctors');
// $foo =  json_decode($response->body())->data[0];
// $viewData['res'] = $foo->attributes->f_name;


class AppointmentsController extends Controller{
    public function listAll(){
        $renderData = array();
        $renderData['title'] = "All Appointments";
        $renderData['appointments'] = Appointment::all();

        return view('dashboard')->with('renderData', $renderData);
    }

    public function delete($id){
        Appointment::destroy($id);        
        return redirect('/dashboard');
    }

    public function new($id){
        $viewData = array();

        $viewData['user_id'] = Auth::user()->id;
        $viewData['doctor_id'] = $id;
        $viewData['doctor'] = "";
        
        return view('appointments.new')->with('viewData', $viewData);
    }
    
    public function create(Request $req){
        $startDateTime =  $req->appointment_date .' ' .$req->appointment_time; 
        $appt = new Appointment;
        $appt['user_id'] = $req->user_id;
        $appt['doctor_id'] = $req->doctor_id;
        $appt['datetime_start'] = $startDateTime;
        $appt['datetime_end'] =  Carbon::parse($startDateTime)->addHour();
        $appt['status_id'] = 0;
        $appt['created_at'] = Carbon::now();
        $appt['updated_at'] = Carbon::now();
        $appt->save();

        // return view('appt')->with('appt', $appt);
        if(Auth::user()->role_id == 1 ){
            return redirect('/dashboard');
        }else{
            return redirect('/dashboard');
        }
        
    }

    public function cancel($id){
        // $startDateTime =  $req->appointment_date .' ' .$req->appointment_time; 
        $appt = Appointment::findorFail($id);
        $appt['status_id'] = -1;
        $appt->save();
        return back();
    }

}?>