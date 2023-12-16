<div class="relative bg-black text-white p-4 rounded-lg shadow-md">
    <div class="entry">
        <div class="flex items-center mb-4">
            <div class="flex justify-between mr-4">
                <img src="{{ asset('storage/avatars/' . $user->avatar)}}" class="w-8 h-8 rounded-full">
                <h3 class="text-lg font-semibold ml-2">{{ $user->account_name }}</h3>
            </div>
            <p class="text-gray-500">{{ $entry->created_at->diffForHumans() }}</p>
        </div>
        <h3 class="text-xl font-semibold mb-2">{{ $entry->title }}</h3>
        <p class="text-gray-300 mb-4">{{ $entry->content }}</p>
    </div>
</div>
