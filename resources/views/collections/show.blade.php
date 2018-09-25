@extends('layouts.app')

@section('content')
    @guest
        <showcollection :collection="{{ json_encode($collection) }}"></showcollection>
    @else
        @if(Auth::user()->isAdmin())
            <showcollection :auth="true" :collection="{{ json_encode($collection) }}"></showcollection>
        @else
            <showcollection :collection="{{ json_encode($collection) }}"></showcollection>
        @endif
    @endguest

@endsection