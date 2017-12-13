@extends('layout')


@section('contenido')
<h1>Editar Mensaje de {{$message->nombre}}</h1>
<form action="{{ route('mensajes.update',$message->id) }}" method="POST" accept-charset="utf-8">
	<!--
		Obtiene el token de verificacion para permitir ser enviado
<input type="hidden" name="_token" value="{{ csrf_token()}}">-->
    {!! method_field('PUT') !!}
<!-- El segundo valor se envia al formulario -->
@include('messages.form',['btnText'=>'Actualizar',
    'showFields' => ! $message->user_id
])

	{{-- {!! csrf_field() !!} --}}
<!-- Todo se identifica a travez del name para las validaciones -->
<!--
	<p>
	<label for="nombre">
    Nombre
	<input class="form-control" type="text" name="nombre" value="{{ $message->nombre }}"> -->
	<!-- Textos se encuentran en resources/lang/en/validate.php -->
<!--	{!! $errors->first('nombre','<span class="error">:message</span>')!!}
    </label>
    </p>
    	<p>
	<label for="email">
    Email
	<input class="form-control" type="email" name="email" value="{{ $message->email }}">
	{!! $errors->first('email','<span class="error">:message</span>')!!}
    </label>
    </p>
    <p>	
    <label for="mensaje">
    Mensaje
	<textarea class="form-control" name="mensaje">{{ $message->mensaje }}</textarea>
	{!! $errors->first('mensaje','<span class="error">:message</span>')!!}
    </label>
    </p>
    <input class="btn btn-primary" type="submit" value="Enviar">-->
</form>
@stop