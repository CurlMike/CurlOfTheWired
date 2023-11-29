@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center bg-black">
        <div class="text-white font-sans text-center">
            <h1 class="text-4xl font-bold mb-4">About Me</h1>
            <hr class="w-64 h-1 mx-auto my-4 bg-white border-0 rounded md:my-6 dark:bg-gray-700">
            <p class="mb-4">Hi! My (online) alias is CurlMike and this is my first web development related project. <br>
                <br>
                This is The Wired. If you have watched "Serial Experiments Lain", you will already know what this is all about. <br>
                Based on the anime and especially on the PS1 game, this blog type of website will serve as a social network website. <br>
                <br>
                You can create diary entries, talk about what's on your mind and share your thoughts and problems, or simply tell how your day went. <br>
                For now that is all, but as I get more familiar with this tech, maybe it will get better. <br>
                <br>
                Maybe one day, you'll even upload your conscience here, and leave your mortal body behind. :) <br>
                <br>
                CurlMike
            </p>
            <ul class="mb-4">
                <li class="inline-block relative">
                    <a href="{{ url('/') }}" class="text-white-300 font-bold hover:text-blue-500 mr-4">Return</a>
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
