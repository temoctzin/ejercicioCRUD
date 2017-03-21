<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Producto;

class ProductosController extends Controller
{
    	public function store(Request $request)
	{
	 $this->validate($request, [
	    'nombre' => 'required|string',
	    'descripcion' => 'required|string',
	 ]);
		$producto = new Producto;
		$producto -> nombre = $request->input('nombre');
		$producto -> descripcion = $request->input('descripcion');
		$producto -> save();

		return response()->success(compact('producto'));
	}
        
	public function get()
	{
	 $productos = Producto::get();
	
	 return response()->success(['productos' => $productos]);
	}
}
