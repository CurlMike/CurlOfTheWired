@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center bg-black">
        <div class="text-white font-sans text-center">
            <h1 class="text-4xl font-bold mb-4">Create New Account</h1>
            <form action="{{ route('register.createAccount') }}" method="post">
                @csrf
                <div class="mb-4">
                    <input class="bg-transparent border border-white p-2" type="text" name="username" placeholder="Username">
                    @error('username')
                        <p class="text-red-500 mt-2">! {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input class="bg-transparent border border-white p-2" type="text" name="name" placeholder="Name">
                    @error('name')
                        <p class="text-red-500 mt-2">! {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input class="bg-transparent border border-white p-2" type="email" name="email" placeholder="Email">
                    @error('email')
                        <p class="text-red-500 mt-2">! {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input class="bg-transparent border border-white p-2" type="password" name="password" placeholder="Password">
                    @error('passowrd')
                        <p class="text-red-500 mt-2">! {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input class="bg-transparent border border-white p-2" type="password" name="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <p class="text-red-500 mt-2">! {{ $message }}</p>
                    @enderror
                </div>
                <button class="bg-transparent border hover:bg-gray-500 border-white text-white p-2" type="submit">Register</button>
                <button class="bg-transparent border hover:bg-gray-500 border-white text-white p-2 ml-2" type="button" onclick="window.location.href='{{ route('welcome') }}'">Return</button>
            </form>
        </div>
    </div>
@endsection