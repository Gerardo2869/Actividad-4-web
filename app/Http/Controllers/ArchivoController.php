<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function subir(Request $request)
{
    $archivo = $request->file('archivo');
    
    if ($archivo) {
        // Guardar archivo
        $path = $archivo->store('archivos', 'public');
        
        // Redirigir a la vista de subida con un mensaje de éxito y el nombre del archivo
        return back()->with('success', 'Archivo subido correctamente')->with('archivo', basename($path));
    }

    return back()->with('error', 'Error al subir el archivo');
}
}
