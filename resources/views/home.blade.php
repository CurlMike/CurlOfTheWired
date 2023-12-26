@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="text-white text-center mb-24 mt-24">
        <div class="mb-10">
            <h1 class="text-3xl font-bold">Welcome to The Wired</h1>
            <h4 class="text-xl">See what's happening.</h4>
        </div>
        <div class="mb-8 items-center">
            <form action="{{ route('entry.create') }}" method="POST" class="flex flex-col items-center" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="flex mr-16">
                    <img src="{{asset('storage/avatars/' . auth()->user()->avatar)}}" class="w-12 h-12 rounded-full mb-2 mr-4" alt="Avatar">
                    <div class="flex flex-col">
                        <input type="text" name="title" class="bg-black text-white border-none mb-2" placeholder="Title (optional)">
                        <textarea class="bg-black resize-none w-96 h-16 text-lg" name="content" rows="2" placeholder="What happened today?" oninput="adjustTextArea(this)"></textarea>
                    </div>
                </div>
                <hr class="border-b-1 border-white w-96 mb-2"/>
                <div class="flex entry-inputs icons justify-between w-96">
                    <i class="file-icon icon-link text-2xl fa-regular fa-image mt-2.5" onclick="openfile()"></i>
                    <input type="file" name="media" class="ml-24 form-control" id="file-input" name="image">
                    <button type="submit" class="create-entry-btn">Create entry</button>
                </div>
            </form>
        </div>
        <div class="entries">
            @foreach ($entries as $entry)
                @include('partials._entry', ['entry' => $entry])
            @endforeach
        </div>
    </div>

    <script>
        function openfile() {
            document.getElementById('file-input').click();
        }

        function adjustTextArea(textarea) {
            textarea.style.height = "4rem";
            textarea.style.height = (textarea.scrollHeight)+"px";
        }

        const csrf_token = '{{ csrf_token() }}';

        function deleteEntry(id) {
            if (confirm('Are you sure you want to delete this entry?')) {
                // Ajax
                fetch(`entry/${id}/delete`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrf_token,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error(error);
                });
            }
            window.location.reload();
        }
    </script>
@endsection