<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\AdminTrait;

class AdminController extends Controller
{
    use AdminTrait;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $this->index();
    }

    public function confirm(Request $request, $id)
    {
        $booking = Booking::find($id);
        $category = Category::where('id', $booking->laundry_type_id)->first();
        $booking->laundry_type_id   = $category->id;
        $booking->weight = round($request->weight);
        $booking->status = true;
        $booking->price = $category->price * $request->weight;
        $booking->save();

        return response()->json([
            'message' => 'Booking Successful Confirmation',
            'data' => $booking,
        ]);
    }
}
