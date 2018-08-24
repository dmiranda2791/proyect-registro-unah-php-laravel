@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @guest
                    <a href="/login">Login</a>
                @else
                <div class="card-header">Información General</div>

                <div class="card-body informacion-general">
                    <!-- <div id="root"></div> -->
                    <div>
                        <div>Cuenta: {{ Auth::user()->cuenta }} <span class="caret"></span></div>
                        <div>Nombre: {{ Auth::user()->name }} <span class="caret"></span></div>
                        <div>Carrera: {{ Auth::user()->carrera }} <span class="caret"></span></div>
                    </div>

                    <div>
                        <div>Centro: {{ Auth::user()->centro }} <span class="caret"></span></div>
                        <div>Indice Global: {{ $indiceGlobal }}</div>
                        <div>Indice Periodo: {{ $indicePeriodo }}</div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                @endguest
            </div>
            @guest
            @else
            <div class="card">
                <div class="card-header">Historial Académico</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Calificación</th>
                                <th scope="col">UV</th>
                                <th scope="col">Periodo</th>
                                <th scope="col">Año</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historial as $clase)
                            <tr>
                                <td>{{$clase->codigo}}</td>
                                <td>{{$clase->nombre}}</td>
                                <td>{{$clase->calificacion}}</td>
                                <td>{{$clase->uv}}</td>
                                <td>{{$clase->periodo}}</td>
                                <td>{{$clase->anio}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            @endguest
            </div>
        </div>
    </div>
</div>
@endsection
