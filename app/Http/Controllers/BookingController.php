<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Repositories\BookingRepository;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    use ApiResponser;

    protected $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function index()
    {
        $booking = $this->bookingRepository->getBookingUser();
        return $this->successResponse($booking, 'Success');
    }

    public function store(Request $request)
    {
        $category = $this->bookingRepository->createBooking($request);

        $request->validate([
            'laundry_type_id' => 'required',
            'address' => 'required',

        ]);

        $booking = new Booking();
        $booking->user_id = auth()->user()->id;
        $booking->laundry_type_id = $request->laundry_type_id;
        $booking->date = Carbon::now();
        $booking->address = $request->address;
        $booking->laundry_type = $category->laundry_type;
        $booking->save();

        return $this->successResponse($booking, 'Booking has been created successfully');
    }
}
