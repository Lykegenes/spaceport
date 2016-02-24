@extends('layouts.app')

@section('htmlheader_title')
	Liste
@endsection

@section('contentheader_title')
	Manage the Columns in this List
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						Columns
						<a href="{{ action('ColumnController@create') }}" class="btn btn-xs btn-success pull-right">Create a new column</a>
					</div>

					<div class="panel-body">
						<ul>
			        @forelse ($columns as $column)
			          <li><a href="{{ action('ColumnController@show', ['id' => $column->id]) }}">{{ $column->name }}</a></li>
			        @empty
			          <p>Aucune colonne :(</p>
			        @endforelse
			      </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
