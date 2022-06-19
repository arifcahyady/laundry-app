<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Repositories\AdminRepository;
use App\Traits\AdminTrait;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class AdminController extends Controller
{
    use ApiResponser;

    protected $adminRepository;

    public function __construct(adminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        $admin = $this->adminRepository->getBookingAll();
        return $this->successResponse($admin, 'Success', 200);
    }

    public function confirm(Request $request, $id)
    {
        if (!$booking = Booking::find($id)) {
            return $this->notFoundResponse('booking');
        }

        $category = $this->adminRepository->confirmBooking($id);
        $booking->laundry_type_id = $category->id;
        $booking->weight = round($request->weight);
        $booking->status = true;
        $booking->price = $category->price * $request->weight;
        $booking->save();

        return $this->successResponse($booking, 'Booking successfully confirmed', 200);
    }
}
