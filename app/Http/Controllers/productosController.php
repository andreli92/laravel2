<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class productosController extends Controller
{
    public function getPDF()
    {
        $name="Juan Perez";
        $pdf='PDF'::loadView('PDF_Example', compact('name'));
        return $pdf->download('prueba.pdf');
    }
    public function index()
    {
        return view('productos');
    }
    public function mostrar()
    {
        echo "Método mostrar";
    }
    public function crear()
    {
        return view("crear");
    }
    public function dataFormulario(Request $request)
    {
        return $request->input('nombre');
    }

}
