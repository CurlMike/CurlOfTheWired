@foreach($users as $user)
    <div class="justify-center ml-auto mr-auto mt-4 mb-4 border-b-2 border-gray-400" style="width: 45rem">
        <div class="flex justify-between mt-4 mb-2">
            <a href="{{ route('user.index', [ 'account_name' => $user->account_name ])}}" class="flex">
                <img src="{{ asset('storage/avatars/' . $user->avatar)}}" class="w-10 h-10 rounded-full">
                <div class="flex-col ml-1">
                    <h3 class="hover:underline">{{$user->username}}</h3>
                    <h4 class="text-gray-500 -mt-2"><span>@</span>{{$user->account_name}}</h4>
                </div>
            </a>
            <p class="text-gray-500">Joined on {{$user->joined_at->format("F Y")}}</p>
        </div>
        <p class="text-gray-300 mb-2">{{$user->bio}}</p>
        @if (!auth()->user()->follows($user))
            @can('followAccount', $user)
                <form action="{{ route('user.follow', [ 'account_name' => $user->account_name])}}" method="POST" class="mb-4">
                    @csrf
                    @method('POST')
                    <button class="follow-button">Follow</button>
                </form>
            @endcan
        @else
            @can('unfollowAccount', $user)
                <form action="{{ route('user.unfollow', [ 'account_name' => $user->account_name])}}" method="POST" class="mb-4">
                    @csrf
                    @method('DELETE')
                    <button class="unfollow-button">Unfollow</button>
                </form>
            @endcan
        @endif
    </div>

    <style>
        form .follow-button,
        form .unfollow-button {
            padding: 5px 10px;
        }
    </style>
@endforeach