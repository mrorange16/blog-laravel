	<!--
		Obtiene el token de verificacion para permitir ser enviado
<input type="hidden" name="_token" value="{{ csrf_token()}}">-->
	{!! csrf_field() !!}
<!-- Todo se identifica a travez del name para las validaciones -->

@if ( $showFields)
	<p>
	<label for="nombre">
    Nombre
	<input class="form-control" type="text" name="nombre" value="{{ $message->nombre or old('nombre') }}">
	<!-- Textos se encuentran en resources/lang/en/validate.php -->
	{!! $errors->first('nombre','<span class="error">:message</span>')!!}
    </label>
    </p>
    	<p>
	<label for="email">
    Email
	<input class="form-control" type="email" name="email" value="{{ $message->email or old('email') }}">
	{!! $errors->first('email','<span class="error">:message</span>')!!}
    </label>
    </p>
    <p>	
@endif
	


    <label for="mensaje">
    Mensaje
	<textarea class="form-control" name="mensaje">{{ $message->mensaje or old('mensaje') }}</textarea>
	{!! $errors->first('mensaje','<span class="error">:message</span>')!!}
    </label>
    </p>
    <!-- Ese or es una funcion de Laravel -->
    <input class="btn btn-primary" type="submit" value="{{  $btnText or 'Guardar' }}">