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
                        <p class="text-sm font-medium mr-1">10K</p>
                        <p class="text-sm font-medium text-gray-600">Followers</p>
                    </div>
                    <div class="flex mr-4">
                        <p class="text-sm font-medium mr-1">15</p>
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
        <div class="text-white text-center">
            <div class="entries">
                @foreach ($entries as $entry)
                    @include('partials._entry', ['entry' => $entry])
                @endforeach
            </div>
        </div>
    </div>
@endsection