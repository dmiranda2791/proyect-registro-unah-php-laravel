<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $historial;
        if($user) {
            $historial = DB::table('users')
            ->where('users.id', $user->id)
            ->join('secciones_users', 'users.id', '=', 'secciones_users.user_id')
            ->join('secciones', 'secciones.id', '=', 'secciones_users.seccion_id')
            ->join('clases', 'secciones.clase_id', '=', 'clases.id')
            ->select('clases.codigo', 'clases.nombre', 'secciones_users.calificacion', 'clases.uv', 'secciones.periodo', 'secciones.anio')
            ->get();
        }
        return view('home', ['historial' => $historial]);
    }
}
