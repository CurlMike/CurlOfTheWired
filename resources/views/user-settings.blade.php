@extends('layouts.app')

@section('topbar')
    @include('partials._topbar')
@endsection

@section('content')
    <div class="text-center my-20">
        <h2 class="text-3xl text-white font-bold">{{$user->account_name}}'s Settings</h2>
        <p class="text-xl text-gray-500">Use this page to manage your settings.</p>
        <div class="mb-4 mt-10">
            <h3 class="text-white text-xl block mb-2">Delete Account</h3>
            <button type="button" name="deleteAccountbtn" class="text-red-500 border border-red-500 rounded-full p-2 hover:bg-red-400 hover:text-red-700 hover:cursor-pointer" id="deleteAccountbtn">Delete Account</button>
            <p class="text-gray-500 text-lg mt-2">Use this button if you want to permanently delete your account.
                <br> This action is permanent. Please make sure you want to continue.
            </p>
        </div>
    </div>

    <div class="settingsModal" id="settingsModal">
        <div class="settingsModal-content p-4 rounded-lg">
            <i class="fa-solid fa-x text-right text-white hover:cursor-pointer" id="closeModal"></i>
            <h2 class="text-xl text-white font-bold text-center mb-2">You are about to delete your account.</h2>
            <p class="text-red-500 font-bold text-center mb-2">Remeber, this action is permanent.</p>
            <form method="POST" action="{{ route('user.delete', ['account_name' => $user->account_name])}}" class="mb-2">
                @csrf
                @method('DELETE')
                <label for="deleteConfirm" class="text-gray-500 text-center block mb-4">Type "I understand" in the input box below if you want to continue.</label>
                <input autocomplete="off" placeholder="I understand" class="bg-black text-white border border-white p-2 block mx-auto mb-4" type="text" id="deleteConfirm" name="deleteConfirm">
                <button type="submit" class="bg-red-300 border border-red-500 rounded-full text-gray-400 p-2 block mx-auto" id="confirmedDeleteAccountbtn" name="confirmedDeleteAccountbtn" disabled>Delete</button>
            </form>
            <p id="sadText" class="hidden text-center text-white text-lg">I'm sad to see you go :(</p>
        </div>
    </div>
    <script src="{{asset('js/userSettings.js')}}"></script>
@endsection