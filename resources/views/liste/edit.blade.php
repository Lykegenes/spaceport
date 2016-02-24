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
					<div class="panel-heading">Listes</div>

					<form role="form" action="{{ action('ListeController@update', ['id' => $id]) }}" method="post">
				    {!! csrf_field() !!}

						<div class="panel-body">
							{!! form_rest($form) !!}
						</div>

						<div class="panel-footer">
							<button type="submit" class="btn btn-primary">Edit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
