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
        <div id="spaceport-lists-index" class="panel panel-default">
          <div class="panel-heading">
            Listes @{{ message }}
            <a href="{{ action('ListController@create') }}" class="btn btn-xs btn-success pull-right">Create a new list</a>
          </div>

          <div class="panel-body">
            <ul>
              <p v-if="lists.length == 0"> Aucune liste </p>
              <li v-for="list in lists">
                <a href="#"> @{{ list }} </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="panel panel-default">
          <spaceport-lists-create></spaceport-lists-create>
        </div>
      </div>
    </div>
  </div>
@endsection
