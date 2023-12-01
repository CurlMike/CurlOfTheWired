@section('profile')
    <div class="flex justify-between items-center bg-black text-white p-4">
        <!-- Left side: Banner and Profile Picture -->
        <!--
        <div class="flex items-center space-x-4">
            <div class="w-24 h-24 rounded-full overflow-hidden">
                <img src="" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <div class="w-48 h-24">
                <img src="" alt="Banner" class="w-full h-full object-cover">
            </div>
        </div> -->
        <!-- Right side: User information -->
        <div class="flex flex-col items-start">
            <h2 class="text-2xl font-bold">{{ $user->username }}</h2>
            <h3 class="text-lg"><span>@</span>{{ $user->account_name }}</h3>
            <h4 class="text-sm">{{ $user->user_type }}</h4>
            <p class="text-gray-300">{{ $user->bio }}</p>
        </div>
    </div>
@endsection