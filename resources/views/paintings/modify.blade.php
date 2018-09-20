@extends('layouts.app')

@section('content')

    <modifypainting :paintings="{{ $paintings }}"></modifypainting>

@endsection