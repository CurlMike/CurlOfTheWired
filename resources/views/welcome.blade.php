@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center bg-black">
        <div class="text-white font-sans text-center">
            <img src="{{ asset('images/navi.gif') }}" alt="Navi" class="mx-auto mb-4">

            <h1 class="text-4xl font-bold mb-4">Welcome to The Wired</h1>
            <ul class="mb-4">
                <li class="inline-block relative">
                    <a href="{{ url('/about') }}" class="text-white-300 font-bold hover:text-blue-500 mr-4">About</a>
                    <div class="h-full absolute top-0 right-0 bg-white w-0.5"></div>
                </li>
                <li class="inline-block relative">
                    <a href="{{ url('/contacts') }}" class="text-white-300 font-bold hover:text-blue-500 mr-4 ml-2">Contacts</a>
                    <div class="h-full absolute top-0 right-0 bg-white w-0.5"></div>
                </li>
                @guest
                <li class="inline-block relative">
                    <a href="{{ route('login.index') }}" class="text-white-300 font-bold hover:text-blue-500 mr-4 ml-2">Log in</a>
                    <div class="h-full absolute top-0 right-0 bg-white w-0.5"></div>
                </li>
                <li class="inline-block relative">
                    <a href="{{ route('register.index') }}" class="text-white-300 font-bold hover:text-blue-500 ml-2">Create account</a>
                </li>
                @else
                <li class="inline-block relative">
                    <a href="{{ route('login.logout') }}" class="text-white-300 font-bold hover:text-blue-500 ml-2">Log out</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
@endsection

