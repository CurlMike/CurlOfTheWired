<div class="relative bg-black text-white rounded-lg shadow-md">
    <div class="entry border border-gray-500 p-4">
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
            <p class="text-gray-500 ml-auto">{{ $entry->created_at->diffForHumans() }}</p>
            <div class="ml-4 icons">
                @if(Auth::user()->id === $entry->user_id)
                    {{-- <i class="icon-link fa-solid fa-pencil text-xl mr-1"></i> --}}
                    <i class="icon-link fa-solid fa-trash text-xl" onclick="deleteEntry({{ $entry->id }})"></i>
                @endif
                @if(Auth::user()->id !== $entry->user_id)
                    {{-- <i class="flag-icon fa-solid fa-flag text-xl"></i> --}}
                @endif
            </div>
        </div>
        <h3 class="text-xl font-semibold mb-3">{{ $entry->title }}</h3>
        <div class="entry-text">
            <p class="text-gray-300 mb-4">{{ $entry->content }}</p>
        </div>
        @if ($entry->media)
            <div class="entry-media">
                <img src="{{ asset('storage/entries/' . $entry->media)}}" class="mx-auto block img-thumbnail w-128 h-32 mb-2 rounded-xl border border-white" alt="Media">
            </div>
        @endif
    </div>
</div>