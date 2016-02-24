@extends('master')

@section('page-header', 'Your Lists')

@section('page-content')

    @section('panel-title')
        <a href="{{ action('ListeController@getCreate') }}" class="btn btn-primary">Create a new list</a>
    @overwrite

    @section('panel-content')
      <ul>
        @forelse ($listes as $liste)
          <li><a href="{{ action('ListeController@getShow', ['id' => $liste->id]) }}">{{ $liste->name }}</a></li>
        @empty
          <p>Aucune liste :(</p>
        @endforelse
      </ul>
    @overwrite

    @section('panel-footer')
    @overwrite

@include('panel')
@stop
