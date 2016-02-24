@extends('master')

@section('page-header', 'View List')

@section('page-content')

  @section('panel-title', 'List properties')

  {!! form_start($form) !!}
  @section('panel-content')
    {!! form_rest($form) !!}
  @overwrite

  @section('panel-footer')
    <button type="submit" class="btn btn-primary">Edit</button>
    {!! form_end($form) !!}
  @stop
@include('panel')

<ul>
  @forelse ($columns as $column)
    <li><a href="{{ action('ListeController@getShow', ['id' => $column->id]) }}">{{ $column->name }}</a></li>
  @empty
    <p>Aucune colonne :(</p>
  @endforelse
</ul>
@section('panel-title', 'List columns')
@include('panel')

@stop
