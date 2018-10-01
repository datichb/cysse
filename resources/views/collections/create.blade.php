@extends('layouts.app')

@section('content')
    <createcollection :paintings='{{ json_encode($paintings) }}' :types='{{ json_encode($type) }}'></createcollection>

@endsection