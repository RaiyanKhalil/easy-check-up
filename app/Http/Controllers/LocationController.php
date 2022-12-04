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
        $response = Http::get('http://api.positionstack.com/v1/forward?access_key=1e6f8d4a91222bf72dcec5e91f02732a&query='.$address);
        $foo =  json_decode($response->body())->data;
        $locArr = array($foo[0]->latitude, $foo[0]->longitude);

        var_dump($locArr);
        return $locArr;
    }

}
