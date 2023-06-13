<center><strong>Gobierno de El Salvador </strong></center>
<center><strong>Instituto SalvadoreÃ±o del Seguro Social<strong></center>
<br>
<center><strong>Listado de Proyectos<strong></center>
Fecha: <?php
     $mytime = Carbon\Carbon::now();
     echo $mytime->toDateTimeString();
    ?>
<br>

<table class="table table-stripped table-hover">

    <tr>
        <th>#</th>
        <th>Nombre del Proyecto</th>
        <th>Fuente de Fondos</th>
        <th>Monto Planificado</th>
        <th>Monto Patrocinado</th>
        <th>Monto Fondos Propios</th>
   </tr>
    <tbody>
        @foreach($Proyecto as $detail)
        <tr>
            <td>{{$detail->id}}</td>
            <td>{{$detail->NombreProyecto}} </td>
            <td>{{$detail->FuenteFondos}}</td>
            <td align="right">

                {{$detail->MontoPlanificado}}

            </td>
            <td align="right">{{$detail->MontoPatrocinado}}</td>
            <td align="right">{{$detail->MontoFondosPropios}}</td>
        @endforeach
    </tbody>
</table>
