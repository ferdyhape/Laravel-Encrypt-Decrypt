<?php

namespace App\Models;

use App\Encryptable;
use App\Services\EncryptionService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasUuids, Encryptable;

    protected $guarded = ['id'];

    // Accessors for decrypting attributes
    protected $decryptable = ['name'];

    // Mutators for encrypting attributes before saving
    protected $encryptable = ['name'];

    public function getNameAttribute($value)
    {
        return $this->decryptAttribute('name', $value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->encryptAttribute('name', $value);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
