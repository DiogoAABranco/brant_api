<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    //
    public function patient(){
        return response()->json([
            'nome' => 'string',
            'email' => 'string',
            'address' => 'string',
        ]);
    }
}
