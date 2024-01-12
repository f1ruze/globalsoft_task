<?php

namespace App\Models;

use App\Traits\HasDates;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Book  extends Model
{
    use HasDates;

    protected $fillable = [
        'name',
        'version',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];


}
