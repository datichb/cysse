@extends('layouts.app')

@section('content')

    <showcollection :collection="{{ json_encode($collection) }}"></showcollection>

@endsection