<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Client\ConnectionException;



class CustomHomeController extends Controller
{

    public function getExternalDoctors()
    {
        $response = Http::get('http://192.168.0.62:1337/api/doctors');
        // var_dump($ressponse) ;
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
        try{
            $response = Http::get('http://192.168.0.62:1337/api/doctors/');
            $builtRes =  json_decode($response->body());

            if($response->successful()){
                if($response && $builtRes && $builtRes->data){
                    foreach ($builtRes->data as $x => $d) { 
                        $doc = $d->attributes;
                        $doc->external = true;
                        $externalDoc[$x] = $doc;
                    }
                }
            }
            
        } catch (ConnectionException $e) {

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

    public function getSearch()
    {
        $externalDoc = array();
        $internalDoc = array();

        if (request('search')) {
            $docAll = Doctor::where('doc_type', 'like', '%' . request('search') . '%')->get();
        } else if(request('search') == ''){
            try{
                $response = Http::get('http://192.168.0.62:1337/api/doctors/');
                
                if($response->successful()){
                    $builtRes =  json_decode($response->body());
                
                    if($response && $builtRes && $builtRes->data){
                        foreach ($builtRes->data as $x => $d) { 
                            $doc = $d->attributes;
                            $doc->external = true;
                            $externalDoc[$x] = $doc;
                        }
                    }
                }

            } catch(ConnectionException $e){

            }
        
            foreach (Doctor::all() as $x => $d) { 
                $internalDoc[] = (object) $d;
            }
            $docAll=array_merge($externalDoc, $internalDoc);
        }
    
        return view('welcome')->with('users', $docAll);
    }

}
