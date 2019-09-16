{{-- Importaremos nuestra plantilla --}}
@extends('templates.template')

{{-- incluiremos nuestro codigo dentro de esta sección --}}
@section('seccion')
    <h2 class="text-center mt-3">Modificar empleado</h2>

    <form action="{{url('/empleados/'.$empleado->id)}}" method="post" enctype="multipart/form-data" class="col-8 col-lg-6 col-md-8 col-sm-10" style="margin: 0 auto; padding: 25px; background: #e0e0e0">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
    
        <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="" value="{{$empleado->nombre}}" class="form-control" placeholder="Nombre del empleado" aria-describedby="helpId" required>
              </div>
              <div class="form-group">
                <label for="apellido">Apellidos</label>
                <input type="text" class="form-control" name="apellido" value="{{$empleado->apellido}}" id="" aria-describedby="helpId" placeholder="Apellido del empleado" required>
              </div>
              <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" name="correo" value="{{$empleado->correo}}" id="" aria-describedby="emailHelpId" placeholder="Correo del empleado" required>
              </div>
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" name="telefono" value="{{$empleado->telefono}}" id="" aria-describedby="helpId" placeholder="Telefono del empleado" required>
              </div>
              <div class="form-group">
                <label for="foto">Foto</label>
                <img src="{{ asset('storage').'/'. $empleado->foto}}" alt="Foto" class="m-3" width="200">
                <input type="file" class="form-control-file" name="foto" id="" placeholder="" aria-describedby="fileHelpId">
              </div>
              <button type="submit" class="btn btn-primary">Modificar</button>
    </form>

@endsection