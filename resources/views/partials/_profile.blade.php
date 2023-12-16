@section('profile')
    <div class="relative bg-black">
        <!-- Banner -->
        <div class="flex justify-center space-x-0">
            <div class="top-0 bottom-0 left-0 w-px bg-white"></div>
            <img src="{{ asset('storage/banners/' . $user->banner)}}" alt="Banner" class="w-256 h-128 object-cover">
            <div class="top-0 bottom-0 right-0 w-px bg-white"></div>
        </div>
    
        <!-- Profile Picture -->
        <div class="flex -mt-14 justify-center items-center">
            <div class="w-32 h-32 rounded-full overflow-hidden mr-72">
                <img src="{{ asset('storage/avatars/' . $user->avatar)}}" alt="Profile Picture" class="rounded-full" style="border: 4px solid #000000;">
            </div>
            <button class="white-border-btn -mb-10 ml-44">Edit Profile</button>
        </div>
        
        <!-- Profile Information -->
        <div class="flex justify-between text-white p-4 profile-details">
            <div class="flex flex-col items-start">
                <h2 class="text-2xl font-bold">{{ $user->username }}</h2>
                <h3 class="text-lg"><span>@</span>{{ $user->account_name }}</h3>
                <h4 class="text-sm">{{ $user->user_type }}</h4>
                <div class="border-b-2 border-white w-32"></div>
            </div>
        </div>
        <div class="bio">
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