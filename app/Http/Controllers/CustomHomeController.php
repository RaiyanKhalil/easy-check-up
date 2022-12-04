<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomHomeController extends Controller
{

    // public function getExternalDoctors()
    // {
    //     # code...
    //     // echo "yolo";



    //     $url = 'http://192.168.0.62:1337';
    //     $collection_name = 'api/doctors';
    //     $request_url = $url . '/' . $collection_name;
        
    //     $curl = curl_init($request_url);    
    //     $response = curl_exec($curl);
    //     curl_close($curl);

        
    //     // echo $response;
    //     return view('welcome')->with("docData", $response);
    // }


    public function getExternalDoctors()
    {
        # code...

        
        return view('welcome');
    }
}
