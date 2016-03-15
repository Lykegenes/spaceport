@extends('layouts.app')

@section('htmlheader_title')
  Settings
@endsection

@section('contentheader_title')
  @{{ SpaceportHeader.titles | last }}
@endsection


@section('main-content')
  <router-view></router-view>
@endsection
