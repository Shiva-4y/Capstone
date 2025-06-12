@extends('user_dashboard')

@section('content')
<div class="bg-white p-6 rounded-lg shadow border border-gray-200 max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold text-red-600 mb-6">👤 Profile Settings</h2>

    @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- Update Profile Info -->
    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4 mb-8">
        @csrf

        <div>
            <label class="block text-sm text-gray-700 mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-red-400 focus:outline-none">
            @error('name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-red-400 focus:outline-none">
            @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
            Save Changes
        </button>
    </form>

    <hr class="my-8">

    <!-- Update Password -->
    <h3 class="text-xl font-semibold text-gray-700 mb-4">🔒 Change Password</h3>
    <form action="{{ route('profile.updatePassword') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm text-gray-700 mb-1">Current Password</label>
            <input type="password" name="current_password"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-red-400 focus:outline-none">
            @error('current_password') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">New Password</label>
            <input type="password" name="password"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-red-400 focus:outline-none">
            @error('password') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-red-400 focus:outline-none">
        </div>

        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
            Update Password
        </button>
    </form>
</div>
@endsection
