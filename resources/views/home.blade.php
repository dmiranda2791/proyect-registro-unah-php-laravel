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
                        <div>Indice Global:</div>
                        <div>Indice Periodo:</div>
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
                    {{ $historial }}
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
