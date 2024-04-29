<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncryptedMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_email',
        'encrypted_message',
        'encryption_key',
        'expire_in_hours',
        'expires_at',
    ];
}
