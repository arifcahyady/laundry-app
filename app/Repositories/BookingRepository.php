<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Category;
use Illuminate\Http\Request;

class BookingRepository
{
    public function getBookingUser()
    {
        $booking = Booking::where('user_id', auth()->user()->id)->get();
        return $booking;
    }

    public function createBooking(Request $request)
    {
        $category = Category::where('id', $request->laundry_type_id)->first();
        return $category;
    }
}
