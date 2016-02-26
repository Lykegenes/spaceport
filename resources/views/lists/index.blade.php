@extends('layouts.app')

@section('htmlheader_title')
  Liste
@endsection

@section('contentheader_title')
  Manage your lists
@endsection


@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <spaceport-list-index></spaceport-list-index>
        </div>

        <div class="panel panel-default">
          <spaceport-list-create-form></spaceport-list-create-form>
        </div>
      </div>
    </div>
  </div>
@endsection
