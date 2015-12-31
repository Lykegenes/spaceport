@extends('master')

@section('page-header', 'Create a new List')

@section('page-content')

  @section('panel-title', 'List creation form')

  {!! form_start($form) !!}
  @section('panel-content')
    {!! form_rest($form) !!}
  @overwrite

  @section('panel-footer')
    <button type="submit" class="btn btn-primary">Create</button>
    {!! form_end($form) !!}
  @stop

@include('panel')
@stop
