<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function publicFileGet($location)
    {
        return response()->file(public_path('storage/'.$location));
    }
}
