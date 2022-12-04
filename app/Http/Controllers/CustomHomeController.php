<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomHomeController extends Controller
{

    public function getExternalDoctors()
    {
        $response = Http::get('http://192.168.0.62:1337/api/doctors');
        // var_dump($response) ;
        $foo =  json_decode($response->body())->data;
        $docArr = array(1,2,3);
        foreach ($foo as $x => $d) { 
            $docArr[$x] = $d->attributes;
        }
        return view('welcome')->with('docData', $docArr);
    }

}
