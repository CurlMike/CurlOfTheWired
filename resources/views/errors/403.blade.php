@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
<div class="text-white text-center mt-20 mb-24">
    <img class="mr-auto ml-auto" src="{{ asset('images/403_banner.jpg')}}" style="width: 50%; opacity: 0.5">
    <div class="flex justify-center text-2xl font-bold mt-4">
        <p class="text-red-500 mr-1">403:</p>
        <p>UNNAUTHORIZED</p>
    </div>
    <p class="text-xl">You aren't allowed to view this page.</p>
    <p class="text-lg text-gray-500">You should go somewhere else.</p>
    <div class="flex mt-8 justify-between mr-auto ml-auto" style="width: 32rem;">
        <a class="flex hover:bg-gray-700" href="{{ url('/search') }}">
            <i class="fa-solid fa-magnifying-glass text-5xl"></i>
            <div class="text-left ml-2">
                <p class="text-lg font-bold">Search page</p>
                <p>Search for an account</p>
            </div>
        </a>
        <a class="flex hover:bg-gray-700" href="{{ url()->previous() }}">
            <i class="fa-solid fa-backward text-5xl"></i>
            <div class="text-left ml-2">
                <p class="text-lg font-bold">Return</p>
                <p>Backtrack to the previous page</p>
            </div>
        </a>
    </div>
</div>
@endsection