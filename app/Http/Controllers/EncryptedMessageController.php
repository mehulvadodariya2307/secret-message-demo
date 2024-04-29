<?php

namespace App\Http\Controllers;

use App\Mail\DecryptionLinkEmail;
use App\Models\EncryptedMessage;
use App\Services\MessageEncryptor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EncryptedMessageController extends Controller
{
    public function composeMessage(Request $request)
    {
        $request->validate([
            'key' => 'required|min:5|max:10',
            'message' => 'required|min:3',
            'recipient_email' => 'required|email',
        ], [
            'key.required' => 'Key field is required.',
            'key.min' => 'Key field minimum 5 character required.',
            'key.max' => 'Key field maximum 10 character allowed.',
            'message.required' => 'message field is required.',
            'message.min' => 'message field minimum 3 character required.',
            'recipient_email.required' => 'Email field is required.',
            'recipient_email.email' => 'Email field must be email address.',
        ]);

        $key = $request->key;
        $recipient_email = $request->recipient_email;
        $expire_in_hours = $request->expire_in_hours;
        $message = $request->message;

        $encryptor = new MessageEncryptor($key);
        $encrypted_message = $encryptor->encryptMessage($message);

        // Save encrypted message to database
        $encrypted = EncryptedMessage::create([
            'recipient_email' => $recipient_email,
            'encrypted_message' => $encrypted_message,
            'encryption_key' => $key,
            'expire_in_hours' => $expire_in_hours,
            'expires_at' => null,
        ]);

        // Send email to recipient
        Mail::to($recipient_email)->send(new DecryptionLinkEmail($encrypted->id));

        return back()->with('success', 'Message successfully sent');
    }
}
