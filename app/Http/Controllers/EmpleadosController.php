<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //devolveremos la vista de empleados
        $datos['empleados']= Empleados::paginate(5);
        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //devolveremos la vista de creacion de registros
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // obtendremos los datos de la petición a excepcion del token
        $datosEmpleado = request()->except('_token');
        if($request->hasFile('foto')){
            //guardaremos la foto dentro de la carpeta store de laravel
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        //Insetaremos un registro en la base de datso
        Empleados::insert($datosEmpleado);
        return redirect('empleados')->with('mensaje', 'Empleado agregado con éxito');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscar un registro por medio del ID
        $empleado = Empleados::findOrFail($id);
        //Mostrar la vista de modificación
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Obtenes los registros del formulario a excepción del token
        $datosEmpleado = request()->except(['_token','_method']);
        if($request->hasFile('foto')){
            //Buscar un registo por medio del ID
            $empleado = Empleados::findOrFail($id);
            //Eliminar la foto de storage de laravel
            Storage::delete('public/'.$empleado->foto);
            //Guardar la nueva foto
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        //Actualizar el registro de la base de datos con los datos del formulario
        Empleados::where('id','=',$id)->update($datosEmpleado);
        //Redireccionar a la vista de empleados
        return redirect('empleados')->with('mensaje', 'Empleado modficado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtener un registro de base de datos en base al ID
        $empleado = Empleados::findOrFail($id);
        if(Storage::delete('public/'.$empleado->foto)){
            //Eliminar un registro de la base de datos en base a un ID
            Empleados::destroy($id);
            //redireccionar a la vista de empleados
        };
        //Redireccionar a la vista de empleados
        return redirect('empleados');
    }
}
