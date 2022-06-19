<?php

namespace App\Traits;

use App\Models\Booking;
use App\Models\Category;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

trait BookingTrait
{
    use ApiResponser;

    protected function getUserBooking()
    {
        $booking = Booking::where('user_id', auth()->user()->id)->get();
        return $this->successResponse($booking, 'Success');
    }

    protected function createBooking(Request $request)
    {
        $category = Category::where('id', $request->laundry_type_id)->first();

        $request->validate([
            'laundry_type_id' => 'required',
            'address' => 'required',

        ]);

        $booking = new Booking;
        $booking->user_id = auth()->user()->id;
        $booking->laundry_type_id = $request->laundry_type_id;
        $booking->date = Carbon::now();
        $booking->address = $request->address;
        $booking->laundry_type = $category->laundry_type;
        $booking->save();

        return $this->successResponse($booking, 'Booking has been created successfully');
    }
}
