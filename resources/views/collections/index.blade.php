@extends('layouts.app')

@section('content')
    @guest
        <listcollection :cc='{{ json_encode($collection) }}' :nbc='{{ json_encode($nbCollection) }}'></listcollection>
    @else
        @if(Auth::user()->isAdmin())
            <listcollection :auth='true' :cc='{{ json_encode($collection) }}' :nbc='{{ json_encode($nbCollection) }}'></listcollection>
        @else
            <listcollection :cc='{{ json_encode($collection) }}' :nbc='{{ json_encode($nbCollection) }}'></listcollection>
        @endif
    @endguest

@endsection