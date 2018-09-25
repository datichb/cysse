@extends('layouts.app')

@section('content')

    @auth
        <showcollection :auth="true" :collection="{{ json_encode($collection) }}"></showcollection>
    @endauth

    @guest
        <showcollection :collection="{{ json_encode($collection) }}"></showcollection>
    @endguest

@endsection