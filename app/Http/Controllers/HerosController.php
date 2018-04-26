<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HerosController extends Controller
{
    public function index(){

        $json = '{ id: 11, name: \'Mr. Dhar\' },
            { id: 12, name: \'Malay\' },
            { id: 13, name: \'BATMAN\' },
            { id: 14, name: \'Celeritas\' },
            { id: 15, name: \'Magneta\' },
            { id: 16, name: \'RubberMan\' },
            { id: 17, name: \'Dynama\' },
            { id: 18, name: \'Dr IQ\' },
            { id: 19, name: \'Magma\' },
            { id: 20, name: \'Tornado\' }';
        $result = json_decode ($json);


        return response()->json([
            'status' => 200,
            'response' =>  $result
        ],200);
    }
}
