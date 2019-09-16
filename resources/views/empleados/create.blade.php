{{-- Importaremos nuestra plantilla --}}
@extends('templates.template')

{{-- incluiremos nuestro codigo dentro de esta sección --}}
@section('seccion')
    <h2 class="text-center m-3">Agregar Nuevo Empleado</h2>

    <form action="{{url('/empleados')}}" method="post" enctype="multipart/form-data" class="col-8 col-lg-6 col-md-8 col-sm-10" style="margin: 0 auto; padding: 25px; background: #e0e0e0">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="" class="form-control" placeholder="Nombre del empleado" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="apellido">Apellidos</label>
          <input type="text" class="form-control" name="apellido" id="" aria-describedby="helpId" placeholder="Apellido del empleado">
        </div>
        <div class="form-group">
          <label for="correo">Correo</label>
          <input type="email" class="form-control" name="correo" id="" aria-describedby="emailHelpId" placeholder="Correo del empleado">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="text" class="form-control" name="telefono" id="" aria-describedby="helpId" placeholder="Telefono del empleado">
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" class="form-control-file" name="foto" id="" placeholder="" aria-describedby="fileHelpId">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection