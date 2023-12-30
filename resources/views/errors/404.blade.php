@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="text-white text-center mt-20 mb-24">
        <img class="mr-auto ml-auto" src="{{ asset('images/404_banner.png')}}" style="width: 50%; opacity: 0.5">
        <div class="flex justify-center text-2xl font-bold mt-4">
            <p class="text-red-500 mr-1">404:</p>
            <p>NOT FOUND</p>
        </div>
        <p class="text-xl">This page does not exist.</p>
        <p class="text-lg text-gray-500">You should go somewhere else.</p>
        <div class="flex mt-8 justify-between mr-auto ml-auto" style="width: 55rem;">
            <div class="border border-white hover:bg-gray-500">
                <a class="flex p-4" href="{{ route('search.index') }}">
                    <i class="fa-solid fa-magnifying-glass text-5xl"></i>
                    <div class="text-left ml-2">
                        <p class="text-lg font-bold">Search page</p>
                        <p>Search for an account</p>
                    </div>
                </a>
            </div>
            <div class="border border-white hover:bg-gray-500">
                <a class="flex p-4" href="{{ route('home') }}">
                    <i class="fa-solid fa-house text-5xl"></i>
                    <div class="text-left ml-2">
                        <p class="text-lg font-bold">Home page</p>
                        <p>Return to your feed page</p>
                    </div>
                </a>
            </div>
            <div class="border border-white hover:bg-gray-500">
                <a class="flex p-4" href="{{ url()->previous() }}">
                    <i class="fa-solid fa-backward text-5xl"></i>
                    <div class="text-left ml-2">
                        <p class="text-lg font-bold">Return</p>
                        <p>Backtrack to the previous page</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection