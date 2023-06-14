@extends('tema.base')

@section('content')
    <div class="container py-5 text-center">
        <center><strong>GOBIERNO DE EL SALVADOR</strong></center>
        <center><strong>INSTITUTO SALVADOREÑO DEL SEGURO SOCIAL<strong></center>
        <br>
        <center><strong>Listado de Proyectos<strong></center>
        Fecha: <?php
            $mytime = Carbon\Carbon::now();
            echo $mytime->toDateTimeString();
            ?>
        <br>

        <table class="table table-sm text-center" style='font-size: 15px'>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre del Proyecto</th>
                    <th scope="col">Fuente de Fondos</th>
                    <th scope="col">Monto Planificado</th>
                    <th scope="col">Monto Patrocinado</th>
                    <th scope="col">Monto Fondos Propios</th>
                </tr>
            </thead>
            <tbody>
                @forelse($proyecto as $detail)
                    <tr>
                        <th scope="row">{{$detail->id}}</th>
                        <td>{{$detail->nombreProyecto}}</td>
                        <td>{{$detail->fuenteFondos}}</td>
                        <td>{{$detail->montoPlanificado}}</td>
                        <td>{{$detail->montoPatrocinado}}</td>
                        <td>{{$detail->montoFondosPropios}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
