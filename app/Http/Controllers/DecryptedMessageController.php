<?php

namespace App\Http\Controllers;

use App\Models\EncryptedMessage;
use App\Services\MessageEncryptor;
use Illuminate\Http\Request;

class DecryptedMessageController extends Controller
{
    public function readMessage(Request $request, $id)
    {
        $encryptedMessage = EncryptedMessage::findOrFail($id);
        $encrypted_message = $encryptedMessage->encrypted_message;

        if (! empty($encryptedMessage->expires_at) && $encryptedMessage->expires_at < now()) {
            return view('readMessage', ['expires' => $encryptedMessage->expires_at]);
        }

        $key = $request->key;
        if (isset($key)) {
            $encryptor = new MessageEncryptor($key);
            $decrypted_message = $encryptor->decryptMessage($encrypted_message);

            if ($encryptedMessage->expire_in_hours > 0) {
                $encryptedMessage->expires_at = now()->addHours($encryptedMessage->expire_in_hours);
            } else {
                $encryptedMessage->expires_at = now();
            }
            $encryptedMessage->save();

            return view('readMessage', ['decrypted_message' => $decrypted_message]);
        }

        return view('readMessage');
    }
}
