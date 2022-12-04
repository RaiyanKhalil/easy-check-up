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

        // if(!isset($doc->id)) return redirect('/');
        $viewData = array();
        $viewData['user_id'] = Auth::user()->id;
        $viewData['doctor_id'] = $id;
        $viewData['doctor'] = $doc;
        $viewData['timeslots'] = array(
            '07:00:00' => '7:00 - 8:00 am',
            '08:00:00' => '8:00 - 9:00 am',
            '09:00:00' => '9:00 - 10:00 am',
            '10:00:00' => '10:00 - 11:00 am',
            '11:00:00' => '11:00 - 12:00 pm',
            '12:00:00' => '12:00 - 1:00 pm',
            '13:00:00' => '1:00 - 2:00 pm',
            '14:00:00' => '2:00 - 3:00 pm',
            '15:00:00' => '3:00 - 4:00 pm',
            '16:00:00' => '4:00 - 5:00 pm',
            '17:00:00' => '5:00 - 6:00 pm',

        );
        $viewData['tomorrow'] = Carbon::tomorrow()->format('Y-m-d');
        
        return view('appointments.new')->with('viewData', $viewData);
    }
    
    public function create(Request $req){
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

        // return view('appt')->with('appt', $appt);
        if(Auth::user()->role_id == 1 ){
            return redirect('/dashboard');
        }else{
            return redirect('/dashboard');
        }
        
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

}?>