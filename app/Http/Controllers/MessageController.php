<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function getConversation(Request $request, $id)
    {
        $user = auth('api')->user();
        $conversations = Message::where(function ($query) use ($user, $id) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', $id);
        })->get();

        return response()->json([
            'status' => 'success',
            'users' => $conversations,
        ]);
    }
    public function createMessage(Request $request, $toUserId)
    {
        $user = auth('api')->user();

        // Validate the request data
        $request->validate([
            'content' => 'required|string',
        ]);

        // Check if the recipient user exists
        $recipientUser = User::find($toUserId);
        if (!$recipientUser) {
            return response()->json(['error' => 'Recipient user not found.'], 404);
        }

        $message = new Message([
            'sender_id' => $user->id,
            'receiver_id' => $toUserId,
            'content' => $request->input('content'),
        ]);

        $message->save();

        return response()->json([
            'status' => 'success',
            'message' => $message,
        ]);
    }
}
