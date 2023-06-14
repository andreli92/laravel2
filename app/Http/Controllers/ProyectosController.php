<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;
use Spatie\FlareClient\View;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyecto = Proyecto::paginate(5);
        return view('proy.index')
                    ->with('proyecto',$proyecto);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proy.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreProyecto' => 'required|max:50',
            'fuenteFondos' => 'required',
            'montoPlanificado' => 'required',
            'montoPatrocinado' => 'required',
            'montoFondosPropios' => 'required'
        ]);
        $proyecto = Proyecto::create($request->only('nombreProyecto','fuenteFondos','montoPlanificado','montoPatrocinado','montoFondosPropios'));
        Session::flash('mensaje','Registro creado con éxito');
        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        return view('proy.update')
                    ->with('Proyecto',$proyecto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombreProyecto' => 'required|max:50',
            'fuenteFondos' => 'required',
            'montoPlanificado' => 'required',
            'montoPatrocinado' => 'required',
            'montoFondosPropios' => 'required'
        ]);
        $proyecto->nombreProyecto = $request['nombreProyecto'];
        $proyecto->fuenteFondos = $request['fuenteFondos'];
        $proyecto->montoPlanificado = $request['montoPlanificado'];
        $proyecto->montoPatrocinado = $request['montoPatrocinado'];
        $proyecto->montoFondosPropios = $request['montoFondosPropios'];
        $proyecto->save();
        Session::flash('mensaje','Registro editado con éxito');
        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        Session::flash('mensaje','Registro eliminado con éxito!');
        return redirect()->route('proyectos.index');
    }

    public function getPdf()
    {
        /*$proyecto = Proyecto::paginate(5);
        $pdf='PDF'::loadView('proy.reporte')->with('proyecto',$proyecto);
        return $pdf->stream('prueba.pdf');*/
        /*$proyecto = Proyecto::all();
        return view('proy.reporte')
                    ->with('proyecto',$proyecto);*/
        $proyecto = Proyecto::all();
        view()->share('proyecto', $proyecto);
        $pdf='PDF'::loadView('proy.reporte');
        return $pdf->stream('prueba.pdf');
    }
}
