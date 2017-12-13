@extends('layout')


@section('contenido')

<h1>Saludo para <?php echo $nombre; ?></h1>
<h1>Saludo para {{ $nombre }}</h1>
<!-- Muestra el codigo como string -->
<h1>{{ $html }}</h1>
<!-- Muestra el codigo sin filtrar el html -->
<h1>{!! $html !!}</h1>
<!--<ul>
	@foreach($consolas as $consola)
	<li>{{ $consola}}</li>
	@endforeach
</ul>
-->
<!-- Si un array pueda estar vacio se utiliza forelse -->
<ul>
	@forelse($consolas as $consola)
	<li>{{ $consola}}</li>
	@empty
	<p>No hay consolas</p>
	@endforelse
</ul>
@if(count($consolas)===3)
<p>Si hay consolas</p>
@elseif(count($consolas)===1)
<p>Agotadas</p>
@else
<p>Quedan 2</p>
@endif

@stop