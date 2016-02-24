@extends('layouts.app')

@section('htmlheader_title')
	Liste
@endsection

@section('contentheader_title')
	Create a column
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Column creation form</div>

					<form role="form" action="{{ action('ColumnController@store', ['list' => $list]) }}" method="post">
				    {!! csrf_field() !!}

						<div class="panel-body">
							{!! form_rest($form) !!}
						</div>

						<div class="panel-footer">
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
