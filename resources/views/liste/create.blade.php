@extends('master')

@section('page-header')
    {{ 'Create a new List' }}
@overwrite

@section('page-content')

    @section('panel-title')
        {{ 'List creation form' }}
    @stop

    <form role="form">
        @section('panel-content')
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>
        @overwrite

        @section('panel-footer')
            <button type="submit" class="btn btn-primary">Create</button>
        @stop
    </form>



@include('panel')
@stop
