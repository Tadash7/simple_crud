<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'thumbnail',
    ];

    protected function price(): Attribute {
        return Attribute::make(
            get: fn (float $value) => $value / 100,
            set: fn (float $value) => ceil($value * 100),
        );
    }
}
