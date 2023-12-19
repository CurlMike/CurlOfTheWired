@section('topbar')
    <div class="flex justify-between items-center bg-black text-white p-4">
        <!-- Left side: Home and Search buttons -->
        <div class="flex items-center icons">
            <div class="mr-4 icon-link">
                <a href="{{ url('/home') }}">Home
                    <i class="fa-solid fa-house"></i>
                </a>
            </div>
            <div class="mr-4 icon-link">
                <a href="{{ url('/search') }}">Search
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
            @if (Auth::check())
            <div class="icon-link">
                <a href="{{ route('user.index', ['account_name' => auth()->user()->account_name])}}">Profile
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
            @endif
        </div>

        <div class="flex font-bold text-xl">
            TheWired
            <img src="{{asset('images/naviBW.png')}}" class="w-6 h-6 ml-2" alt="Navi Icon">
        </div>

        <div class="flex items-center icons">
            @auth
                <p class="mr-4 text-blue-500">Signed in as {{ auth()->user()->username }}</p>
                <a class="icon-link" href="{{ route('login.logout')}}">Log out</a>
            @else
                <p class="mr-4 text-blue-500">Viewing as Guest</p>
                <a class="icon-link" href="{{ route('login.index') }}">Sign in</a>
            @endauth
        </div>
    </div>
    <hr class="border-b-2 border-white w-full"/>
@endsection