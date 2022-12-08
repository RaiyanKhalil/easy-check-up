<?php
namespace App\Http\Controllers;
// use Illuminiate\Http\Request;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
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
        if(!Auth::user()) return redirect('/');
        Appointment::destroy($id);        
        return redirect('/dashboard');
    }

    public function new($id){
        if(!Auth::user()) return redirect('/');
        $doc = Doctor::findorFail($id);

        $viewData = array();
        $viewData['user_id'] = Auth::user()->id;
        $viewData['doctor_id'] = $id;
        $viewData['doctor'] = $doc;
        $viewData['date'] = Carbon::tomorrow()->format('Y-m-d');
        $viewData['today'] = Carbon::today()->format('Y-m-d');
        
        return view('appointments.create')->with('viewData', $viewData);
    }
    
    public function create(Request $req){

        $req->validate([
            'datetime_start' => 'required',
            'datetime_end' => 'required',
        ]);

        
        $startDateTime =  $req->appointment_date .' ' .$req->appointment_time; 
        $appt = new Appointment;
        $appt['user_id'] = $req->user_id;
        $appt['doctor_id'] = $req->doctor_id;
        $appt['datetime_start'] = $startDateTime;
        $appt['datetime_end'] =  Carbon::parse($startDateTime)->addHour();
        $appt['status_id'] = 1;
        $appt['created_at'] = Carbon::now();
        $appt['updated_at'] = Carbon::now();
        $appt->save();

        return redirect('/dashboard');
        
    }

    public function cancel($id){
        if(!Auth::user()) return redirect('/');
        $appt = Appointment::findorFail($id);
        $appt['status_id'] = 3;
        $appt->save();
        return back();
    }

    public function approve($id){
        if(!Auth::user()) return redirect('/');
        $appt = Appointment::findorFail($id);
        $appt['status_id'] = 2;
        $appt->save();
        return back();
    }

    public function edit($id){
        $appt = Appointment::findorFail($id);
        if($appt->user_id !== Auth::user()->id) return redirect(route('dashboard-patient'));

        $viewData = array();
        $viewData['appt'] = $appt;
        $viewData['doctor_id'] = $appt->doctor_id;
        $viewData['user_id'] = $appt->user_id;
        $viewData['date'] = Carbon::parse($appt->datetime_start)->format('Y-m-d');
        $viewData['time'] =  Carbon::parse($appt->datetime_start)->toTimeString();
        $viewData['doctor'] = Doctor::findorFail($appt->doctor_id);
        $viewData['today'] = Carbon::today()->format('Y-m-d');
        
        
        return view('appointments.create')->with('viewData', $viewData);
    }


    public function update(Request $req, $id){
        $startDateTime =  $req->appointment_date .' ' .$req->appointment_time; 
        $appt = Appointment::findOrFail($id);
        $appt->user_id = $req->user_id;
        $appt->doctor_id = $req->doctor_id;
        $appt->datetime_start = $startDateTime;
        $appt->datetime_end =  Carbon::parse($startDateTime)->addHour();
        $appt->status_id = 1;
        $appt->created_at = Carbon::now();
        $appt->updated_at = Carbon::now();
        $appt->save();

        return redirect('/dashboard');
        
    }

}?>