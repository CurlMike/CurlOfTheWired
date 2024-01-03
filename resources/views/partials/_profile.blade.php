@section('profile')
    <div class="relative bg-black">
        <!-- Banner -->
        <div class="flex justify-center space-x-0">
            <div class="top-0 bottom-0 left-0 w-px bg-white"></div>
            <img src="{{ asset('storage/banners/' . $user->banner)}}" alt="Banner" class="banner object-cover object-center">
            <div class="top-0 bottom-0 right-0 w-px bg-white"></div>
        </div>
    
        <!-- Profile Picture -->
        <div class="flex -mt-14 items-center avatar">
            <div class="w-32 h-32 rounded-full overflow-hidden">
                <img src="{{ asset('storage/avatars/' . $user->avatar)}}" alt="Profile Picture" class="rounded-full" style="border: 4px solid #000000;">
            </div>
            @can('editProfile', $user)
                <a href={{ route('user.edit', [ 'account_name' => $user->account_name])}} class="-mb-10">
                    <button class="white-border-btn">Edit Profile</button>
                </a>
            @endcan
            <div class="flex">
                <input type="hidden" value="{{ auth()->user()->follows($user) }}" id="followsVar">
                <input type="hidden" value="{{ auth()->user() == $user }}" id="isAuth">
                <form action="{{ route('user.unfollow', [ 'account_name' => $user->account_name])}}" method="POST" class="-mb-10" id="unfollowForm">
                    @csrf
                    @method('DELETE')
                    <button class="unfollow-button" id="unfollowBtn" account-name="{{ $user->account_name }}">Unfollow</button>
                </form>
                <form action="{{ route('user.follow', [ 'account_name' => $user->account_name])}}" method="POST" class="-mb-10" id="followForm">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @method('POST')
                    <button class="follow-button" id="followBtn" account-name="{{ $user->account_name }}">Follow</button>
                </form>
            </div>
        </div>
        
        <!-- Profile Information -->
        <div class="flex justify-between text-white p-4 profile-details">
            <div class="flex flex-col items-start">
                <h2 class="text-2xl font-bold">{{ $user->username }}</h2>
                <h3 class="text-lg"><span>@</span>{{ $user->account_name }}</h3>
                @if ($user->user_type === 'owner')
                    <div class="rounded-md bg-gradient-to-r from-blue-600 to-purple-800 p-1 mt-1 mb-1">
                        <h4 class="text-sm">God of The Wired</h4>
                    </div>
                @endif
                @if ($user->private)
                    <h3 class="text-red-500">Private profile</h3>
                @else
                    <h3 class="text-green-400">Public profile</h3>
                @endif
                <div class="flex mb-2">
                    <div class="flex mr-4">
                        <p class="text-sm font-medium mr-1" id="followerCount">{{ $user->followers()->count() }}</p>
                        <p class="text-sm font-medium text-gray-600">Followers</p>
                    </div>
                    <div class="flex mr-4">
                        <p class="text-sm font-medium mr-1">{{ $user->followings()->count() }}</p>
                        <p class="text-sm font-medium text-gray-600">Following</p>
                    </div>
                    <div class="flex">
                        <p class="text-sm font-medium text-gray-600 mr-1">Joined on</p>
                        <p class="text-sm font-medium">{{ $user->joined_at->format('F Y') }}</p>
                    </div>
                </div>
                <div class="border-b-2 border-white w-32"></div>
            </div>
        </div>
        <div class="bio profile-details">
            <p class="text-gray-300">{{ $user->bio }}</p>
        </div>
        <hr class="w-96 h-1 mx-auto my-4 bg-white border-0 rounded md:my-6 dark:bg-gray-700" />
        @if ($user->private && !auth()->user()->follows($user))
            <div class="text-blue-500 text-center">
                <h3 class="text-2xl font-bold">This account is private.</h3>
                <p class="text-xl">You have to follow this account to view its posts.</p>
                <div class="flex justify-center mt-4">
                    <img src="{{ asset('images/private.jpg')}}" class="h-72 border-2 border-blue-800 rounded-md">
                </div>
            </div>
        @else
            <div class="flex text-lg mx-auto text-white justify h-16 justify-between p-3 mb-4" style="max-width: 52rem;">
                <button class="flex-1 font-semibold text-center hover:cursor-pointer border-r-2 border-l-2 border-white" id="entriesBtn">Entries</button>
                <button class="flex-1 font-semibold text-center hover:cursor-pointer border-l-2 border-r-2 border-white" id="likesBtn">Likes</button>
            </div>
            <div class="text-white text-center">
                <div class="entries">
                    @foreach ($entries as $entry)
                        @include('partials._entry', ['entry' => $entry])
                    @endforeach
                </div>
                <div class="entries-liked">
                    @foreach ($likedEntries as $likedEntry)
                        @include('partials._entry', ['entry' => $likedEntry])
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <div class="border-2 boder-white text-blue-400 font-semibold text-center items-center p-4" id="copied-to-clipboard">
        <p class="mr-2 text-xl">Link copied to clipboard!</p>
        <i class="text-2xl fa-solid fa-clipboard"></i>
    </div>
    <script src="{{ asset('js/follow.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="{{ asset( 'js/entry.js' )}}"></script>
@endsection