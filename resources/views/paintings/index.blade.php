@extends('layouts.app')

@section('content')

    <paintinglist :paintings='{{ json_encode($paintings) }}'></paintinglist>

@endsection