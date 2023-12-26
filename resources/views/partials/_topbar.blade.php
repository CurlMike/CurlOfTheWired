@section('topbar')
    <div class="topbar-container flex justify-between bg-black text-white p-4">
        <!-- Left side: Home and Search buttons -->
        <div id="left-icons">
            <div class="flex icons">
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
            <div class="hidden icons" id="expanded-icons">
                <div class="mr-4 icon-link">
                    <a href="{{ url('/') }}">Welcome
                        <i class="fa-solid fa-door-open"></i>
                    </a>
                </div>
            </div>
        </div>

        <div id="middle-text">
            <div class="flex font-bold text-xl middle-text">
                TheWired
                <img src="{{asset('images/naviBW.png')}}" class="w-6 h-6 ml-2" alt="Navi Icon">
                <button class="hover:cursor-pointer hover:text-blue-500 flex mt-2 justify-center">
                    <i class="fa-solid fa-chevron-down text-sm ml-2" id="downArrow"></i>
                </button>
            </div>
            <div class="hidden justify-between items-center w-32" id="status-text">
                <p>Viewing</p>
                <i class="fa-solid fa-arrow-right"></i>
                <p id="page-text"></p>
            </div>
        </div>

        <div id="right-icons">
            <div class="flex icons">
                @auth
                    <p class="mr-4 text-blue-500">Signed in as {{ auth()->user()->username }}</p>
                    <a class="icon-link" href="{{ route('login.logout')}}">Log out</a>
                @else
                    <p class="mr-4 text-blue-500">Viewing as Guest</p>
                    <a class="icon-link" href="{{ route('login') }}">Sign in</a>
                @endauth
            </div>
            <div class="hidden icons" id="expanded-icons">
                <div class="icon-link text-right">
                    <a href="">Settings
                        <i class="fa-solid fa-gear"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr class="border-b-2 border-white w-full"/>
    <script src="{{ asset('js/topbar.js')}}"></script>
@endsection