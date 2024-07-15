<?php

namespace App;

use App\Services\EncryptionService;

trait Encryptable
{
    // Helper method to decrypt attribute values
    protected function decryptAttribute($attribute, $value)
    {
        if (in_array($attribute, $this->decryptable)) {
            return app(EncryptionService::class)->decrypt($value);
        }
        return $value;
    }

    // Helper method to encrypt attribute values
    protected function encryptAttribute($attribute, $value)
    {
        if (in_array($attribute, $this->encryptable)) {
            return app(EncryptionService::class)->encrypt($value);
        }
        return $value;
    }
}
