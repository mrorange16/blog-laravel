@extends('layout')


@section('contenido')

<img width="100px" src="{{ Storage::url($user->avatar) }}" alt="">

<h1>{{$user->name}}</h1>
<table class="table">
	<tr>
		<th>Nombre:</th>
		<td>{{$user->name}}</td>
	</tr>
	<tr>
		<th>Email:</th>
		<td>{{$user->email}}</td>
	</tr>
	<tr>
		<th>Roles:</th>
		<td>
		@foreach ($user->roles as $role)
			{{$role->name}}
		@endforeach
			
		</td>
	</tr>
</table>

<!-- Solo deja ver a los admin y propietarios una vez implementado la logica de politicas y roles -->
@can('edit',$user)
<a href="{{route('usuarios.edit',$user->id)}}" class="btn btn-info">Editar</a>
@endcan
@can('destroy',$user)
	<form style="display: inline;" action="{{route('usuarios.destroy',$user->id) }}" method="POST">
					 {!! method_field('DELETE') !!}
	                 {!! csrf_field() !!}
					<button class="btn btn-danger" type="submit">Eliminar</button>
				</form>
				@endcan
@stop