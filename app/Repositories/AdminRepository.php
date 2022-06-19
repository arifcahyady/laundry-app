<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Category;

class AdminRepository
{
    public function getBookingAll()
    {
        $admin = Booking::all();
        return $admin;
    }

    public function confirmBooking($id)
    {
        $booking = Booking::find($id);
        $category = Category::where('id', $booking->laundry_type_id)->first();
        return $category;
    }
}
