<?php

namespace App\Http\Controllers;
use App\vanban;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class vanbanController extends Controller
{
    public function getdata(){

        $vanban = vanban::all();
        dd($vanban);
    } 
}
