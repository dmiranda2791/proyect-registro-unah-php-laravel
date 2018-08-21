<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases;

class ClasesController extends Controller
{
    public function index()
    {
        return Clases::all();
    }
}
