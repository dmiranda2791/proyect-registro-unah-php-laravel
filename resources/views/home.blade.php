@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @guest
                    <a href="/login">Login</a>
                @else
                <div class="card-header">Clases en la DB</div>

                <div class="card-body">
                    <div id="root"></div>
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
