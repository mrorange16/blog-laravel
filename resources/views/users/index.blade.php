@extends('layout')


@section('contenido')
<h1>Usuarios</h1>
<a class='btn btn-primary pull-right' href="{{route('usuarios.create')}}">Crear nuevo usuario</a>
<table class="table">

	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Role</th>
			<th>Notas</th>
				<th>Etiquetas</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach ($users as $user)
			{{-- expr --}}
        <tr>
        	<td>{{$user->id}}</td>
        	<td>{!! $user->present()->link() !!}</td>
        	<td>{{$user->email}}</td>
        	<td>
        	{{-- 	@foreach ($user->roles as $role)
        			{{$role->name}}

        		@endforeach --}}
<!-- Para no hacer el foreach de arriba solo muestra los name de roles y los divide poe wl ' - ' -->
{{-- $user->roles->pluck('name')->implode(' - ')--}}
{{ $user->present()->roles() }}
        		
        	</td>
	<td>{{ $user->present()->notes() }}</td>
              <td>{{ $user->present()->tags() }}</td>
        	<td>	<a class="btn btn-info btn-xs" href="{{ route('usuarios.edit',$user->id) }}">
				Editar
				</a>
				<form style="display: inline;" action="{{route('usuarios.destroy',$user->id) }}" method="POST">
					 {!! method_field('DELETE') !!}
	                 {!! csrf_field() !!}
					<button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
				</form>
</td>
        </tr>
		@endforeach
	</tbody>
</table>
@stop