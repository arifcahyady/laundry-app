<?php

namespace App\Traits;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CustomerTrait
{
    use ApiResponser;

    protected function getProfileCustomer()
    {
        $customer = User::where('id', Auth::id())->first();

        if (!$token = auth('api')->attempt($customer)) {
            return $this->errorResponse('Unauthorized user login', 422);
        }

        return $this->successResponse($customer, 'Success', 200);
    }

    protected function confirmBooking(Request $request, $id)
    {
        if (!$booking = Booking::find($id)) {
            return $this->notFoundResponse('booking');
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
