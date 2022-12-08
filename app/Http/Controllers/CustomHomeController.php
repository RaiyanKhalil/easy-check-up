<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Client\ConnectionException;



class CustomHomeController extends Controller
{


    // Please do not do any modification to this fnction
    public function getDefaultData()
    {
        $externalDoc = array();
        $internalDoc = array();

        try{
            $response = Http::get('https://1a28-70-71-37-182.ngrok.io/api/doctors/');
            
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
    
        return view('welcome')->with('users', $docAll);
    }

    // Please do not do any modification to this fnction 
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        $externalDoc = array();
        $internalDoc = array();

        if($search != ''){

            $docAll = Doctor::query()
                ->where('doc_type', 'LIKE', "%{$search}%")
                ->orWhere('f_name', 'LIKE', "%{$search}%")
                ->orWhere('doc_office_location', 'LIKE', "%{$search}%")
                ->get();
        } elseif($search == '') {
            try{
                $response = Http::get('https://1a28-70-71-37-182.ngrok.io/api/doctors/');
                
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
