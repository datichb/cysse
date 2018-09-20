@extends('layouts.app')

@section('content')

    @auth
        <paintinglist :auth='true' :paintings='{{ json_encode($paintings) }}'></paintinglist>
    @endauth

    @guest
        <paintinglist :paintings='{{ json_encode($paintings) }}'></paintinglist>
    @endguest

@endsection