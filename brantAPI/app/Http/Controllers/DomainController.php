<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    //
    public function index(){

        $domains = Domain::all();

        return response()->json($domains,200);

    }
}
