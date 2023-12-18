@extends('layouts.app')
@include('partials._profile')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    @yield('profile')
@endsection