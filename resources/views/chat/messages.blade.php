@extends('user_dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">📨 Your Conversations</h2>

    @forelse ($conversations as $conv)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition-all duration-300 p-6 mb-5 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-semibold text-gray-900">{{ $conv['user']->name }}</h3>
                <p class="text-sm text-gray-500 mt-1">
                    🛍️ Talking about: <span class="italic">{{ $conv['product_name'] }}</span>
                </p>
            </div>
            <a href="{{ route('chat.view', ['productId' => $conv['product_id'], 'receiverId' => $conv['user']->id]) }}"
               class="inline-flex items-center gap-2 px-5 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 16.5a2.5 2.5 0 01-2.5 2.5H8l-4 4V5a2 2 0 012-2h11.5A2.5 2.5 0 0120 5.5v11z" />
                </svg>
                View Chat
            </a>
        </div>
    @empty
        <div class="text-center py-20 text-gray-500">
            <p class="text-lg font-medium">No conversations found.</p>
            <p class="text-sm mt-2">Start messaging sellers or buyers to see them here.</p>
        </div>
    @endforelse
</div>
@endsection
