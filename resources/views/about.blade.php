@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center about-me">
        <div class="text-white font-sans">
            <h1 class="text-4xl font-bold">About</h1>
            <p class="text-lg text-blue-300">Get to know more about the website.</p>
            <hr class="w-64 h-1 my-2 bg-white border-0 rounded md:my-4 dark:bg-gray-700">
            <div class="mb-4 font-semibold">
                <h3 class="text-blue-400 font-bold mb-1">Myself</h3>
                <hr class="w-32 bg-blue-300 border-0 rounded h-1 mb-2">
                <p>Hi! My (online) alias is CurlMike and this is my first web development related project.
                    <br> This is just a side project, I don't even know if I am able to host it.
                </p>
            </div>
            <div class="mb-4 font-semibold">
                <h3 class="text-red-400 font-bold mb-1">The website</h3>
                <hr class="w-32 bg-red-300 border-0 rounded h-1 mb-2">
                <p>
                    This is The Wired. If you have watched "Serial Experiments Lain", you will already know what this is all about. <br>
                    Based on the anime and especially on the PS1 game, this blog type of website will serve as a social network website. <br>
                    Questions about specific functionalities are in the FAQs page. <br>
                    <br>
                    Maybe one day, you'll even upload your conscience here, and leave your mortal body behind. :) <br>
                </p>
            </div>
            <div class="mb-4 font-semibold">
                <h3 class="text-green-400 font-bold mb-1">Technologies</h3>
                <hr class="w-32 bg-green-300 border-0 rounded h-1 mb-2">
                <p>
                    This website is built on the Laravel framework. <br>
                    Despite it being a PHP framework, I am using javascript to optimize and make the website more user-friendly / better to navigate. <br>
                    I use Tailwind for css, but i have also defined my own styles for some elements. <br>
                    <br>
                    I am insanely clueless when it comes to webdev, so if you have suggestions you should tell me!      
                </p>
            </div>
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
@endsection
