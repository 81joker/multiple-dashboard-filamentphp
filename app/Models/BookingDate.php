<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDate extends Model
{
    use HasFactory;
    protected $table = 'booking_dates';
    protected $fillable = [
        'title',
        'start',
        'end',
        'color',
        'description',
        'status',
        'date',
        'url',
        'url',
        'max_slots',
        'created_on',
        'created_from',
    ];
}