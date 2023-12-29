@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center" style="margin-top: -60px;">
        <div class="flex p-10 border border-white rounded-lg">
            <img src={{ asset('images/register.png') }} class="border border-blue-300 rounded-md">
            <div class="text-white font-sans ml-10">
                <h1 class="text-4xl font-bold">Create New Account</h1>
                <p class="text-blue-300 text-xl mb-1">Welcome to The Wired. Register your account here!</p>
                <div class="border border-white mb-4"></div>
                <form action="{{ route('register.createAccount') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <input class="bg-transparent border border-white p-2" type="text" name="username" placeholder="Username">
                        <p class="text-blue-200 text-md">Your username. You can change it whenever you want.</p>
                        @error('username')
                            <p class="text-red-500 mt-2">! {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input class="bg-transparent border border-white p-2" type="text" name="account_name" placeholder="Account Name">
                        <p class="text-blue-200 text-md">Your account name. It's your identifier, so you can't change it.</p>
                        @error('account_name')
                            <p class="text-red-500 mt-2">! {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input class="bg-transparent border border-white p-2" type="email" name="email" placeholder="Email">
                        <p class="text-blue-200 text-md">Your e-mail. Can be used for reseting your password.</p>
                        @error('email')
                            <p class="text-red-500 mt-2">! {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input class="bg-transparent border border-white p-2" type="password" name="password" placeholder="Password">
                        <p class="text-blue-200 text-md">Your password. Choose a strong password.</p>
                        @error('passowrd')
                            <p class="text-red-500 mt-2">! {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input class="bg-transparent border border-white p-2" type="password" name="password_confirmation" placeholder="Confirm Password">
                        <p class="text-blue-200 text-md">Confirm the password you set.</p>
                        @error('password_confirmation')
                            <p class="text-red-500 mt-2">! {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex text-center mt-2 mx-auto justify-between" style="width: 35%;">
                        <button class="bg-transparent border hover:bg-gray-500 border-white text-white p-2" type="submit">Register</button>
                        <button class="bg-transparent border hover:bg-gray-500 border-white text-white p-2" type="button" onclick="window.location.href='{{ route('welcome') }}'">Return</button>
                    </div>
                </form>
                <p class="text-blue-300 text-center mt-4 mb-2 font-semibold">Already have an account? Log in instead!</p>
                <a href="{{ route('login') }}" class="flex justify-center">
                    <button class="text-white border border-white bg-transparent p-2 hover:bg-gray-500">Log in</button>
                </a>
            </div>
        </div>
    </div>
@endsection