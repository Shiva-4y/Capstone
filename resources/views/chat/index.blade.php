@extends('user_dashboard')

@section('content')
<div class="container max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h4 class="text-2xl font-semibold mb-4 text-gray-800">
        Chat with <span class="text-blue-600">{{ $receiver->name }}</span> about 
        <span class="italic">"{{ $product->name }}"</span>
    </h4>

    <!-- Chat Box -->
    <div class="border rounded p-4 mb-4 h-72 overflow-y-scroll bg-gray-50">
        @forelse($messages as $message)
            <div class="mb-2 {{ $message->sender_id === auth()->id() ? 'text-right' : 'text-left' }}">
                <p class="text-sm">
                    <span class="font-semibold {{ $message->sender_id === auth()->id() ? 'text-blue-600' : 'text-gray-700' }}">
                        {{ $message->sender->name }}:
                    </span>
                    <span>{{ $message->message }}</span>
                </p>
            </div>
        @empty
            <p class="text-center text-gray-400">No messages yet. Start the conversation!</p>
        @endforelse
    </div>

    <!-- Message Input -->
    <form action="{{ route('chat.send') }}" method="POST" class="flex gap-2 mb-6">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        
        <input 
            type="text" 
            name="message" 
            class="flex-1 border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300"
            placeholder="Type your message..." 
            required
        >
        <button 
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
        >
            Send
        </button>
    </form>

    <!-- Buy Now Button -->
    @if(auth()->id() !== $product->user_id)
  <form 
    action="{{ route('transactions.buy', ['productId' => $product->id]) }}" 
    method="POST" 
    class="text-center"
    onsubmit="return confirm('Are you sure you want to buy this item? This will create a transaction and notify the seller.')"
>
    @csrf
    <button 
        type="submit" 
        class="w-full md:w-1/2 bg-green-600 text-white py-3 rounded text-lg font-semibold hover:bg-green-700 transition"
    >
        🛒 Buy Now
    </button>
</form>

    @endif
</div>
@endsection
