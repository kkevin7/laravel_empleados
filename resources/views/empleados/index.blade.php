{{-- Importaremos nuestra plantilla --}}
@extends('templates.template')

{{-- incluiremos nuestro codigo dentro de esta sección --}}
@section('seccion')
    <h2 class="text-center mt-3">Vista de empleados</h2>

    {{-- Mostrar el mensajes del sistema --}}
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{-- Mensaje que mandaremos cuando realizemos una acción --}}
        {{Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

{{-- tabla de empleados --}}
<table class="table table-sm table-bordered table-hover table-striped text-center align-middle">
        <thead class="thead-light">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- recorre el arreglo de datos con for de blade --}}
            @foreach ($empleados as $empleado)
            <tr>
            <td><img src="{{ asset('storage').'/'. $empleado->foto}}" alt="Foto" width="200"></td>
            <td class="align-middle">{{$empleado->nombre}}</td>
            <td class="align-middle">{{$empleado->apellido}}</td>
            <td class="align-middle">{{$empleado->correo}}</td>
            <td class="align-middle">{{$empleado->telefono}}</td>
            <td class="align-middle">
            {{-- Redireccionar a la vista para editar --}}
            <a class="btn btn-warning" href="{{url('/empleados/'.$empleado->id.'/edit')}}">Editar</a>
            </td>
            <td class="align-middle">
            {{-- enviar de parametros por la url --}}
            <form action="{{url('/empleados/'.$empleado->id)}}" method="post">
            {{-- creación de un token para eliminacion de registros --}}
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            {{-- mensaje de confirmación para eliminación --}}
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas eliminar el registro?')">Borrar</button>
            </form>
            </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
    
@endsection