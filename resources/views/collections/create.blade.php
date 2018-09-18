@extends('layouts.app')

@section('content')
    <createcollection :paintings='{{ json_encode($paintings) }}'></createcollection>

@endsection