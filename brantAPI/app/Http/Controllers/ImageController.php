<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    //
    public function show($id){

        $image = Image::findOrFail($id);
        return Response::download(public_path ('storage/'.$image->path) );

    }
}
