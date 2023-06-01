<?php

namespace Tests;

use Codewiser\Casts\AsDatetimeWithTZ;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property null|Carbon $tested_at
 */
class Entity extends Model
{
    protected $casts = [
        'tested_at' => AsDatetimeWithTZ::class
    ];
}
