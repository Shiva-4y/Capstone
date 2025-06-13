@extends('user_dashboard')


@section('content')
<div class="container">
    <h4>Chat with {{ $receiver->name }} about "{{ $product->name }}"</h4>

    <div class="border p-3 mb-3" style="height: 300px; overflow-y: scroll;">
        @foreach($messages as $message)
            <div class="{{ $message->sender_id === auth()->id() ? 'text-end' : 'text-start' }}">
                <p><strong>{{ $message->sender->name }}:</strong> {{ $message->message }}</p>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.send') }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="input-group">
            <input type="text" name="message" class="form-control" placeholder="Type your message...">
            <button class="btn btn-primary">Send</button>
        </div>
    </form>
</div>
@endsection
