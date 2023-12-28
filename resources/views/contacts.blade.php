@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center bg-black contacts">
        <div class="text-white font-sans text-left">
            <h1 class="text-4xl font-bold mb-4">Contacts</h1>
            <hr class="w-64 h-1 my-4 bg-white border-0 rounded md:my-6 dark:bg-gray-700">
            <ul class="mb-4" id="contacts">
                <li class="flex border border-white p-3">
                    <i class="fa-brands fa-discord text-4xl hover:cursor-pointer"></i>
                    <a href="#" class="ml-2">
                        <h2 class="text-4xl font-bold">Discord</h2>
                        <p class="font-semibold">CurlMike</p>
                        <p>Mostly online from afternoon to late night</p>
                    </a>
                </li>
                <li class="flex border border-white p-3">
                    <i class="fa-brands fa-twitter text-5xl hover:cursor-pointer"></i>
                    <a href="https://twitter.com/curlmike/" class="ml-2">
                        <h2 class="text-4xl font-bold">Twitter</h2>
                        <p class="font-semibold">twitter.com/curlmike</p>
                        <p>Mostly just retweet art and things i find funny</p>
                    </a>
                </li>
                <li class="flex border border-white p-3">
                    <i class="fa-brands fa-github text-5xl hover:cursor-pointer"></i>
                    <a href="https://github.com/curlmike/" class="ml-2">
                        <h2 class="text-4xl font-bold">GitHub</h2>
                        <p class="font-semibold">github.com/curlmike</p>
                        <p>Where I house all my projects</p>
                    </a>
                </li>
            </ul>
            <ul class="mb-4 text-center">
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

    <style>
        #contacts li:hover {
            cursor: pointer;
            background-color: gray;
        }
    </style>
@endsection