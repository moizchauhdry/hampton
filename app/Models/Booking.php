<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function bookingDate(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('Y-m-d h:i:s'),
            set: fn (string $value) => Carbon::parse($value)->format('Y-m-d h:i:s'),
        );
    }
}
