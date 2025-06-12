
@section('content')
<div class="max-w-md mx-auto mt-10">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ request()->email }}">

        <label for="password" class="block mb-2">New Password</label>
        <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>

        <label for="password_confirmation" class="block mt-4 mb-2">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border rounded" required>

        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button type="submit" class="mt-4 w-full bg-red-600 text-white p-2 rounded hover:bg-red-700">
            Reset Password
        </button>
    </form>
</div>
@endsection
