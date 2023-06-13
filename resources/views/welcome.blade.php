@extends('tema.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Hola mundo!<h1>
        <a href="{{route('proyectos.index')}}" class="btn btn-primary">Proyectos</a>
    </div>
@endsection
