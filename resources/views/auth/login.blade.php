@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="h-screen flex items-center justify-center bg-black">
        <div class="text-white font-sans text-center">
            <h1 class="text-4xl font-bold mb-4">Log in</h1>
            <form action="{{ route('login.auth') }}" method="post">
                @csrf
                <div class="mb-4">
                    <input class="bg-transparent border border-white p-2" type="username" name="username" id="username" placeholder="Username" required>
                    @error('username')
                        <p class="text-red-500 mt-2">! {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input class="bg-transparent border border-white p-2" type="password" name="password" id="password" placeholder="Password" required>
                    @error('password')
                        <p class="text-red-500 mt-2">! {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <button class="bg-transparent border hover:bg-gray-500 border-white text-white p-2" type="submit">Log in</button>
                    <button class="bg-transparent border hover:bg-gray-500 border-white text-white p-2 mt-2" type="button" onclick="window.location.href='{{ route('welcome') }}'">Return</button>
                </div>
            </form>
        </div>
    </div>
@endsection