<?php

namespace App\Services;

class MessageEncryptor
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function encryptMessage($message)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $cipher = openssl_encrypt($message, 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $iv);
        $encrypted_message = base64_encode($iv.$cipher);

        return $encrypted_message;
    }

    public function decryptMessage($encrypted_message)
    {
        $data = base64_decode($encrypted_message);
        $iv_length = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($data, 0, $iv_length);
        $cipher = substr($data, $iv_length);
        $decrypted_message = openssl_decrypt($cipher, 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $iv);

        return $decrypted_message;
    }
}
