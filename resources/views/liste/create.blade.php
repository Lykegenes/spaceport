@extends('master')

@section('page-header', 'Create a new List')

@section('page-content')

  @section('panel-title', 'List creation form')

  <form role="form" action="{{ action('ListeController@postStore') }}" method="post">
    {!! csrf_field() !!}

    @section('panel-content')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter list name">
        </div>

    @overwrite

  @section('panel-footer')
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  @stop

@include('panel')
@stop
