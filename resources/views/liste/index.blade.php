@extends('layouts.app')

@section('htmlheader_title')
	Liste
@endsection

@section('contentheader_title')
	Manage your lists
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						Listes
						<a href="{{ action('ListeController@getCreate') }}" class="btn btn-xs btn-success pull-right">Create a new list</a>
					</div>

					<div class="panel-body">
						<ul>
			        @forelse ($listes as $liste)
			          <li><a href="{{ action('ListeController@getShow', ['id' => $liste->id]) }}">{{ $liste->name }}</a></li>
			        @empty
			          <p>Aucune liste :(</p>
			        @endforelse
			      </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
