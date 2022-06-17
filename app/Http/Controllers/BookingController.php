<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $booking = Booking::where('user_id', auth()->user()->id)->get();
        return response()->json(['booking' => $booking]);
    }

    public function store(Request $request)
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

        return response()->json([
            'message' => 'Booking has been created successfully',
            'data' => $booking,
        ], 201);
    }
}
