<?php

namespace App\Models;

use App\Traits\HasDates;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasDates;

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
            get: fn() => "{$this->name} {$this->surname}"
        );
    }
}
