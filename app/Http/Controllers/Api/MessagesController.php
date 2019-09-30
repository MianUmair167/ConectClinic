<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Site\SiteController;
use App\Mail\MessageSent;
use App\Models\Message;
use App\Models\Space;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends SiteController
{
    /**
     * Send a message
     */
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'space_id' => 'required|exists:spaces,id',
        ]);

        $space = Space::find($request->get('space_id'));

        //User ID
        $message['from_user_id'] = auth()->user()->id;

        if(!$space) {
            return response()->setStatusCode(400);
        }

        $message['space_id'] = $space->id;
        $message['to_user_id'] = $space->user_id;
        $message['message'] = $request->get('message');

        $messageCreated = Message::create($message);
        if(!$messageCreated) {
            return response()->setStatusCode(400);
        }

        Mail::to(User::find($space->user_id))
            ->send(new MessageSent($messageCreated));

        return response()->json([
            'status' => true,
        ], 200);
    }
}
