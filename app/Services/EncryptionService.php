<?php

namespace App\Services;

class EncryptionService
{
    public function encrypt(string $value): string
    {
        $encryptType = config('app.encryption.type');
        $key = config('app.encryption.key');

        switch ($encryptType) {
            case 'base64':
                return $this->base64Encode($value);
            case 'openssl':
                return $this->opensslEncrypt($value, $key);
            default:
                return $this->defaultEncrypt($value);
        }
    }

    public function decrypt(string $value): string
    {
        $encryptType = config('app.encryption.type');
        $key = config('app.encryption.key');

        switch ($encryptType) {
            case 'base64':
                return $this->base64Decode($value);
            case 'openssl':
                return $this->opensslDecrypt($value, $key);
            default:
                return $this->defaultDecrypt($value);
        }
    }

    private function defaultEncrypt(string $value): string
    {
        return encrypt($value);
    }

    private function defaultDecrypt(string $value): string
    {
        try {
            return decrypt($value);
        } catch (\Exception $e) {
            return $value; // Return original value if decryption fails
        }
    }

    private function base64Encode(string $value): string
    {
        return base64_encode($value);
    }

    private function base64Decode(string $value): string
    {
        return base64_decode($value);
    }

    private function opensslEncrypt(string $value, string $key): string
    {
        $method = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivLength);

        $encrypted = openssl_encrypt($value, $method, $key, OPENSSL_RAW_DATA, $iv);

        // Combine IV and encrypted data, then base64 encode
        $encryptedValue = base64_encode($iv . $encrypted);

        return $encryptedValue;
    }

    private function opensslDecrypt(string $value, string $key): string
    {
        $method = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($method);

        // Decode base64
        $decodedValue = base64_decode($value);

        // Extract IV and encrypted data
        $iv = substr($decodedValue, 0, $ivLength);
        $encrypted = substr($decodedValue, $ivLength);

        // Decrypt using OpenSSL
        $decrypted = openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA, $iv);

        if ($decrypted === false) {
            return $value; // Return original value if decryption fails
        }

        return $decrypted;
    }
}
