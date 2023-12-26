@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center bg-black contacts">
        <div class="text-white font-sans text-center">
            <h1 class="text-4xl font-bold mb-4">Contacts</h1>
            <hr class="w-64 h-1 mx-auto my-4 bg-white border-0 rounded md:my-6 dark:bg-gray-700">
            <div class="icons mb-4">
                <div class="icon-link">
                    <i class="fa-brands fa-discord"></i>
                    <a href="">Discord: CurlMike</a><br>
                </div>
                <div class="icon-link">
                    <i class="fa-brands fa-twitter"></i>
                    <a href="https://twitter.com/curlmike/">Twitter</a> <br>
                </div>
                <div class="icon-link">
                    <i class="fa-brands fa-github"></i>
                    <a href="https://github.com/curlmike/">GitHub</a>
                </div>
            </div>
            <ul class="mb-4">
                <li class="inline-block relative">
                    <a href="{{ url('/') }}" class="text-white-300 font-bold hover:text-blue-500 mr-4">Return</a>
                    <div class="h-full absolute top-0 right-0 bg-white w-0.5"></div>
                </li>
                @guest
                <li class="inline-block relative">
                    <a href="{{ route('login') }}" class="text-white-300 font-bold hover:text-blue-500 mr-4 ml-2">Log in</a>
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