<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'contact',
        'address',
        'email',
        'password',
        
        'f_name',
        'l_name',
        'doc_type',
        'phn_num',
        'doc_office_location',
        'doc_lat',
        'doc_long'

    ];
    use HasFactory;
}
