<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;



class ChatController extends Controller
{
public function chat($productId, $receiverId) {
    $messages = Message::where(function ($query) use ($receiverId, $productId) {
        $query->where(function ($q) use ($receiverId, $productId) {
            $q->where('sender_id', Auth::id())
              ->where('receiver_id', $receiverId)
              ->where('product_id', $productId);
        })->orWhere(function ($q) use ($receiverId, $productId) {
            $q->where('sender_id', $receiverId)
              ->where('receiver_id', Auth::id())
              ->where('product_id', $productId);
        });
    })
    ->orderBy('created_at')
    ->get();

    $product = Product::findOrFail($productId);
    $receiver = User::findOrFail($receiverId);

    return view('chat.index', compact('messages', 'product', 'receiver'));
}

public function send(Request $request) {
    $request->validate([
        'message' => 'required',
        'receiver_id' => 'required',
        'product_id' => 'required',
    ]);

    Message::create([
        'sender_id' => Auth::id(),
        'receiver_id' => $request->receiver_id,
        'product_id' => $request->product_id,
        'message' => $request->message,
    ]);

    return back();
}

public function conversationList()
{
    $userId = Auth::id();

    $messages = Message::where('sender_id', $userId)
                ->orWhere('receiver_id', $userId)
                ->with(['sender', 'receiver', 'product'])
                ->latest()
                ->get();

    $conversations = collect();

    foreach ($messages as $message) {
        $otherUser = $message->sender_id === $userId ? $message->receiver : $message->sender;
        $key = $otherUser->id . '-' . $message->product_id;

        if (!$conversations->has($key)) {
            $conversations->put($key, [
                'user' => $otherUser,
                'product_id' => $message->product_id,
                'product_name' => $message->product->name,
            ]);
        }
    }

    return view('chat.messages', ['conversations' => $conversations->values()]);
}
}
