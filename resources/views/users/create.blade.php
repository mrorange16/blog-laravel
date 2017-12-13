@extends('layout')


@section('contenido')
<h1>Crear Usuario</h1>
<form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
	
    

@include('users.form',['user'=>new App\User])


    <input class="btn btn-primary" type="submit" value="Guardar">
</form>
@stop