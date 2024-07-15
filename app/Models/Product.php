<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Encryptable;

class Product extends Model
{
    use HasFactory, HasUuids, Encryptable;

    protected $guarded = ['id'];

    // Accessors for decrypting attributes
    protected $decryptable = ['name', 'price', 'description'];

    // Mutators for encrypting attributes before saving
    protected $encryptable = ['name', 'price', 'description'];

    public function getNameAttribute($value)
    {
        return $this->decryptAttribute('name', $value);
    }

    public function getPriceAttribute($value)
    {
        return $this->decryptAttribute('price', $value);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->decryptAttribute('description', $value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->encryptAttribute('name', $value);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $this->encryptAttribute('price', $value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $this->encryptAttribute('description', $value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
