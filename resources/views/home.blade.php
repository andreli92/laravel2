@extends('app')
@section('title','Home')

@section('sidebar')
    @parent

    <p>Este es un código en el master sidebar</p>
@endsection
@section('content')
    <p>Esto es parte del cuerpo del contenido!!!!!</p>
@endsection
