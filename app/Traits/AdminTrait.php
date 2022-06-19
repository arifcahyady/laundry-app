<?php

namespace App\Traits;

use App\Models\Booking;
use App\Models\Category;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

trait AdminTrait
{
    use ApiResponser;

    protected function getBooking()
    {
        $admin = Booking::all();
        return $this->successResponse($admin, 'Success', 200);
    }

    protected function confirmBooking(Request $request, $id)
    {
        $booking = Booking::find($id);

        if ($booking->id !== $id) {
            return $this->errorResponse('Booking not found');
        }

        $category = Category::where('id', $booking->laundry_type_id)->first();
        $booking->laundry_type_id   = $category->id;
        $booking->weight = round($request->weight);
        $booking->status = true;
        $booking->price = $category->price * $request->weight;
        $booking->save();

        return $this->successResponse($booking, 'Booking successfully confirmed', 200);
    }
}
