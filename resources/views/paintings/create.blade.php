@extends('layouts.app')

@section('content')

    <createpainting :plumes="{{ json_encode($plumes) }}" :sizes="{{ json_encode($sizes) }}"></createpainting>

@endsection