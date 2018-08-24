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

    private function calcularIndiceGlobal($historial) {
        return round($this->promedioPonderado($historial), 0);
    }

    private function promedioPonderado($clases) {
        $indicePeriodo = 0;
        $sumaCalificaciones = 0;
        $sumaUvs = 0;
        for ($j = 0; $j < sizeof($clases); $j++) {
            $sumaCalificaciones = $sumaCalificaciones + ($clases[$j]->calificacion * $clases[$j]->uv);
            $sumaUvs = $sumaUvs + $clases[$j]->uv;
        }
        return $sumaCalificaciones/$sumaUvs;
    }
    private function calcularIndicePeriodo($historial, $periodo) {
        $clasesPeriodo = [];
        for($i=0; $i < sizeof($historial); $i++) {
            if ($historial[$i]->periodo == $periodo) {
                array_push($clasesPeriodo, $historial[$i]);
            }
        }
        return $this->promedioPonderado($clasesPeriodo);
    }

    public function index()
    {
        $user = Auth::user();
        $historial;
        $indiceGlogal;
        $indicePeriodo;
        if($user) {
            $historial = DB::table('users')
            ->where('users.id', $user->id)
            ->join('secciones_users', 'users.id', '=', 'secciones_users.user_id')
            ->join('secciones', 'secciones.id', '=', 'secciones_users.seccion_id')
            ->join('clases', 'secciones.clase_id', '=', 'clases.id')
            ->select('clases.codigo', 'clases.nombre', 'secciones_users.calificacion', 'clases.uv', 'secciones.periodo', 'secciones.anio')
            ->get();
            $indiceGlogal = $this->calcularIndiceGlobal($historial);
            $indicePeriodo = $this->calcularIndicePeriodo($historial, 2);
        }
        return view('home', [
            'historial' => $historial,
            'indiceGlobal' => $indiceGlogal,
            'indicePeriodo' => $indicePeriodo,
        ]);
    }
}
