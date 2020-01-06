@extends('layouts.master')
@section('content')
<div class="row">

    <div class="col-sm-4">

    <img src="{{$pelicula['poster']}}" style="height:350px"/>

    </div>
    <div class="col-sm-8">

    <h1>  {{$pelicula->title}}</h1>
    <h3>Año: {{$pelicula->year}}</h2>
    <h3>Director: {{$pelicula->director}}</h2>

    <p>
      <p>
        <span style="font-weight: bold;">Resumen:</span> {{$pelicula->synopsis}}
      </p>
    </p>

    <spam><strong>Estado: </strong></spam>
                @if($pelicula->rented)
                <spam>Pelicula actualmente alquilada</spam><p></p>
                <form action="{{ action('CatalogController@putReturn', $pelicula->id) }}" method="POST" style="display:inline">
                    {{ method_field('PUT') }} 
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning" style="display:inline"> Devolver Pelicula </button>                
                </form>
                 @else
                <spam>Pelicula disponible</spam><p></p>
                <form action="{{ action('CatalogController@putRent', $pelicula->id) }}" method="POST" style="display:inline">
                    @method('PUT')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success" style="display:inline"> Alquilar Pelicula </button>             
                </form>
                @endif
                <a type="button" class="btn btn-primary" href="{{ url('/catalog/edit/'.$pelicula->id) }}"><span class="glyphicon glyphicon-pencil"></span> Editar pelicula</a>            
                <form action="{{ action('CatalogController@deleteMovie', $pelicula->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }} 
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" style="display:inline"> <span class="glyphicon glyphicon-trash"></span>  Eliminar Pelicula </button>             
                </form>
                <a type="button" class="btn btn-dark" href="{{ url('/catalog') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Volver al listado</a>
    </div>
</div>
@stop
