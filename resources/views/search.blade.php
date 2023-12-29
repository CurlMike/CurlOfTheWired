@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="text-white mt-24 mb-24">
        <div class="text-center mb-2">
            <h1 class="text-3xl font-bold mb-1">Search</h1>
            <h4>Use this page to search for other users.</h4>
        </div>
        <form method="GET" class="flex justify-center mb-8">
            @csrf
            <input type="text" placeholder="Search for someone" class="bg-transparent h-10 border-b-2 border-gray-500" name="username" id="searchInput">
            <button type="button" class="ml-2 hover:text-blue-500" id="searchBtn">
                <i class="fa-solid fa-magnifying-glass text-2xl"></i>
            </button>
        </form>
        <hr class="ml-auto mr-auto" style="width: 45rem"/>
        <img class="my-10 mx-auto w-64 h-64" src="{{ asset('images/lain_search.png')}}" id="searchImage">
        <div id="searchResults">
            @if(count($users) < 1)
                <p class="text-center mt-4 font-semibold text-xl">Users will appear here.</p>
            @else
                @include('partials._search-users', ['users' => $users])
            @endif
        </div>
    </div>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection