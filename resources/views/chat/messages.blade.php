@extends('user_dashboard')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Your Conversations</h2>

    @forelse ($conversations as $conv)
        <div class="bg-white rounded-2xl shadow-md p-4 mb-4 hover:shadow-lg transition duration-300 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-medium text-gray-900">{{ $conv['user']->name }}</h3>
                <p class="text-sm text-gray-600">Talk About: <span class="italic">{{ $conv['product_name'] }}</span></p>
            </div>
            <a href="{{ route('chat.view', ['productId' => $conv['product_id'], 'receiverId' => $conv['user']->id]) }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                💬 View Chat
            </a>
        </div>
    @empty
        <div class="text-center py-10 text-gray-500">
            <p>No conversations found.</p>
            <p class="text-sm">Start messaging sellers or buyers to see them here.</p>
        </div>
    @endforelse
</div>
@endsection
