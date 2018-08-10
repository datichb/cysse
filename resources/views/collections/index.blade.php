@extends('layouts.app')

@section('content')

    <collectionlist :collection='{{ json_encode($collection) }}'></collectionlist>

@endsection