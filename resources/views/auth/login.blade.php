@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center bg-black" style="margin-top: -60px;">
        <div class="flex p-10 border border-white rounded-lg">
            <div class="text-white font-sans mr-10 my-auto">
                <h1 class="text-4xl font-bold">Log in</h1>
                <p class="text-blue-300 text-xl mb-1">Welcome back! Enter your credentials.</p>
                <div class="border border-white mb-4"></div>
                <form action="{{ route('login.auth') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <input class="bg-transparent border border-white p-2 mb-1" type="account_name" name="account_name" id="account_name" placeholder="Account name" required>
                        <p class="text-blue-200 text-md">The name you set for your account.</p>
                        @error('account_name')
                            <p class="text-red-500 font-bold mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input class="bg-transparent border border-white p-2 mb-1" type="password" name="password" id="password" placeholder="Password" required>
                        <p class="text-blue-200 text-md">The password you set for your account.</p>
                        @error('password')
                            <p class="text-red-500 font-bold mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Keep myself logged in</label>
                    </div>
                    <div class="flex text-center mt-2 mx-auto justify-between" style="width: 42%;">
                        <button class="bg-transparent border hover:bg-gray-500 border-white text-white p-2" type="submit">Log in</button>
                        <button class="bg-transparent border hover:bg-gray-500 border-white text-white p-2" type="button" onclick="window.location.href='{{ route('welcome') }}'">Return</button>
                    </div>
                </form>
                <p class="text-blue-300 text-center mt-4 mb-2 font-semibold">Don't have an account? Register instead!</p>
                <a href="{{ route('register.index') }}" class="flex justify-center">
                    <button class="text-white border border-white bg-transparent p-2 hover:bg-gray-500">Register</button>
                </a>
            </div>
            <img src={{ asset('images/login.jpg') }} class="border border-blue-300 rounded-md">
        </div>
    </div>
@endsection