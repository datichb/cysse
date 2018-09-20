@extends('layouts.app')

@section('content')

    <showpainting :painting="{{ json_encode($painting) }}"></showpainting>

@endsection