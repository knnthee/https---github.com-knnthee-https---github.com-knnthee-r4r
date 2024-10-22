<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class Room extends Model
{

    use HasFactory;
    protected $fillable = [
        'room_title',
        'image',
        'description',
        'price',
        'wifi',
        'room_type',
    ];
}
