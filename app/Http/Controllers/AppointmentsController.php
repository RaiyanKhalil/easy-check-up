<?php
namespace App\Http\Controllers;
// use Illuminiate\Http\Request;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    
    public function create(Request $req){
        // $request->validate([
        //     'stock_name'=>'required',
        //     'ticket'=>'required',
        //     'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
        // ]); 
        // Getting values from the blade template form
        $startDateTime =  $req->appointment_date .' ' .$req->appointment_time; 
        $appt = new Appointment;
        $appt['user_id'] = 1;
        $appt['doctor_id'] = $req->doctor_id;
        $appt['datetime_start'] = $startDateTime;
        $appt['datetime_end'] =  Carbon::parse($startDateTime)->addHour();
        $appt['status_id'] = 0;
        $appt['created_at'] = Carbon::now();
        $appt['updated_at'] = Carbon::now();
        $appt->save();

        // return view('appt')->with('appt', $appt);
        return back();
    }

}?>