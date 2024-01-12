<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => "{$this->name} {$this->surname}"
        );
    }
}
