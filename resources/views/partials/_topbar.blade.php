@section('topbar')
    <div class="flex justify-between items-center bg-black text-white p-4">
        <!-- Left side: Home and Search buttons -->
        <div class="flex items-center">
            <a class="hover:underline mr-4" href="{{ url('/') }}">Home</a>
            <a class="hover:underline mr-4" href="{{ url('/search') }}">Search</a>
            <a class="hover:underline" href="{{ route('user.index', ['account_name' => auth()->user()->account_name])}}">Profile</a>
        </div>

        <!-- Middle: Website name -->
        <div class="font-bold text-xl">TheWired</div>

        <!-- Right side: User status and buttons -->
        <div class="flex items-center">
            @auth
                <p class="mr-4 text-blue-500">Signed in as {{ auth()->user()->username }}</p>
                <a class="hover:underline" href="{{ route('login.logout')}}">Log out</a>
            @else
                <p class="mr-4 text-blue-500">Viewing as Guest</p>
                <a class="hover:underline" href="{{ route('login.index') }}">Sign in</a>
            @endauth
        </div>
    </div>
    <div class="border-b-2 border-white w-full"></div>
@endsection