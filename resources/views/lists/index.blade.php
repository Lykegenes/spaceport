@extends('layouts.app')

@section('htmlheader_title')
  Liste
@endsection

@section('contentheader_title')
  Manage your lists
@endsection


@section('main-content')
  <router-view></router-view>
@endsection
