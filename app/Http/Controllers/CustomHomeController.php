<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Doctor;

class CustomHomeController extends Controller
{

    public function getExternalDoctors()
    {
        $response = Http::get('http://192.168.0.62:1337/api/doctors');
        $foo =  json_decode($response->body())->data;
        $docArr = array(1,2,3);
        foreach ($foo as $x => $d) { 
            $docArr[$x] = $d->attributes;
        }
        return view('welcome')->with('docData', $docArr);
    }


    public function getAllDoctors()
    {
        $externalDoc = array();
        $initRes = Http::get('http://192.168.0.62:1337/api/doctors/');
        $builtRes =  json_decode($initRes->body());
        
        if($initRes && $builtRes && $builtRes->data){
            foreach ($builtRes->data as $x => $d) { 
                $doc = $d->attributes;
                $doc->external = true;
                $externalDoc[$x] = $doc;
            }
        }


        $internalDoc =  array();

        foreach (Doctor::all() as $x => $d) { 
            $internalDoc[] = (object) $d;
        }
        $docAll=array_merge($externalDoc, $internalDoc);
        // function cmp($a, $b)
        // {
        //     if ($a == $b) {
        //         return 0;
        //     }
        //     return ($a->l_name < $b->l_name) ? -1 : 1;
        // }
        // usort($docAll, 'cmp');

        
        return view('welcome')->with('docData', $docAll);
    }

}