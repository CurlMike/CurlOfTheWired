@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="text-white text-center mt-24 mb-24">
        <h1 class="text-3xl font-bold">Edit Account</h1>
        <p class="text-muted">Here you can change your display name, profile picture, 
        and other aspects of your profile.</p>

        <form method="POST" action="{{ route('user.update', ['account_name' => $user->account_name])}}" class="mt-10" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="username" class="block mb-2 font-medium text-white text-xl">Display name</label>
                <input class="bg-transparent border boder-white p-2" id="username" value="{{ $user->username }}" type="text" name="username" placeholder="Display name">
                <p class="text-gray-500 mt-1">This is the name that appears on your profile.</p>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 font-medium text-white text-xl">E-mail</label>
                <input class= "bg-transparent border border-white p-2" id="email" value="{{ $user->email }}" type="email" name="email" placeholder="E-mail">
                <p class="text-gray-500 mt-1">This is the e-mail associated with your profile. <br>
                    Keep it updated in case you lose your password.
                </p>
            </div>
            <div class="mb-4">
                <label for="bio" class="block mb-2 font-medium text-white text-xl">Biography</label>
                <textarea class="bg-transparent border border-white p-2 w-96 h-32" id="bio" name="bio" placeholder="Biography">{{$user->bio}}</textarea>
                <p class="text-gray-500 mt-1">This is your profile biography. You can use it to tell people more about your page.</p>
            </div>
            <div class="mb-4">
                <label for="private" class="block mb-2 font-medium text-white text-xl">Profile Privacy</label>
                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" id="private" value=1 name="private" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-transparent border-4 border-white appearance-none cursor-pointer transition-all duration-300 ease-in-out" {{$user->private ? 'checked' : '' }}>
                    <label for="private" class="toggle-label block overflow-hidden h-6 rounded-full bg-transparent border-2 border-white cursor-pointe focus:outline-none transition-all duration-300 ease-in-out"></label>
                </div>
                <label for="private" class="text-white">Private Account</label>
                <p class="text-gray-500 mt-1">Public accounts are visible to anyone. Private accounts are only visible to followers. <br> Select the box if you wish to make your account private.</p>
            </div>                       
            <div class="mb-4">
                <label for="avatar" class="block mb-2 font-medium text-white text-xl">Profile Picture</label>
                <img src="{{ asset('storage/avatars/' . $user->avatar)}}" class="mx-auto block img-thumbnail w-32 h-32 mb-2" alt="Avatar">
                <input type="file" class="ml-24 form-control" id="avatar" name="avatar">
                <p class="text-gray-500 mt-1">This is the profile picture that appears on your profile page.</p>
            </div>
            <div class="mb-4">
                <label for="banner" class="block mb-2 font-medium text-white text-xl">Profile Banner</label>
                <img src="{{ asset('storage/banners/' . $user->banner)}}" class="mx-auto block img-thumbnail w-128 h-32 mb-2" alt="Banner">
                <input type="file" class="ml-24 form-control" id="banner" name="banner">
                <p class="text-gray-500 mt-1">This is the profile banner that appears on your profile page.</p>
            </div>
            <button class="white-border-btn" type="submit">Update Profile</button>
        </form>
    </div>
@endsection