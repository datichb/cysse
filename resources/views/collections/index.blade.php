@extends('layouts.app')

@section('content')
    @guest
        <collectionlist :collection='{{ json_encode($collections) }}'></collectionlist>
    @else
        @if(Auth::user()->isAdmin())
            <collectionlist :auth='true' :collection='{{ json_encode($collections) }}'></collectionlist>
        @else
            <collectionlist :collection='{{ json_encode($collections) }}'></collectionlist>
        @endif
    @endguest

@endsection