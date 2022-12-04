<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Client\ConnectionException;

class LocationController extends Controller
{
    //
    public static function getLongLat($address)
    {
        $response = Http::get('http://api.positionstack.com/v1/forward?access_key=1e6f8d4a91222bf72dcec5e91f02732a&query=1600 Pennsylvania Ave NW, Washington DC');
        // var_dump($ressponse) ;
        $foo =  json_decode($response->body())->data;
        //  var_dump($foo->latitude);
        $locArr = array($foo[0]->latitude, $foo[0]->longitude);

       /* foreach ($foo as $x => $d) { 
            $docArr[$x] = $d->latitude;
            $docArr[$x] = $d->latitude;
            
        }*/
        var_dump($locArr);
        return $locArr;
    }

}
