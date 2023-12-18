<div class="relative bg-black text-white p-4 rounded-lg shadow-md">
    <div class="entry">
        <div class="flex items-center mb-4">
            <div class="flex justify-between mr-4">
                <a href="{{ route('user.index', [ 'account_name' => $entry->user->account_name ])}}">
                    <img src="{{ asset('storage/avatars/' . $entry->user->avatar)}}" class="w-10 h-10 rounded-full">
                </a>
                <div>
                    <a href="{{ route('user.index', [ 'account_name' => $entry->user->account_name ])}}">
                        <h3 class="hover:underline text-lg font-semibold ml-2">{{ $entry->user->username }}</h3>
                        <h5 class="flex text-gray-400 -mt-2 ml-1.5"><span>@</span>{{ $entry->user->account_name }}</h5>
                    </a>
                </div>
            </div>
            <p class="text-gray-500 mx-auto">{{ $entry->created_at->diffForHumans() }}</p>
            <div class="ml-auto icons">
                <a href="" class="icon-link">
                    <i class="fa-solid fa-bars text-xl mr-1"></i>
                </a>
            </div>
        </div>
        <h3 class="text-xl font-semibold mb-3">{{ $entry->title }}</h3>
        <div class="entry-text">
            <p class="text-gray-300 mb-4">{{ $entry->content }}</p>
        </div>
        @if ($entry->media)
            <div class="entry-media">
                <img src="{{ asset('storage/entries/' . $entry->media)}}" class="mx-auto block img-thumbnail w-128 h-32 mb-2" alt="Media">
            </div>
        @endif
        <hr/>
    </div>
</div>
