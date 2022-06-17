<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Booking()
    {
        return $this->hasMany(Booking::class);
    }
}
