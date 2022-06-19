<?php

namespace App\Traits;

use App\Models\Booking;
use App\Traits\ApiResponser;

trait AdminTrait
{
    use ApiResponser;

    protected function getBooking()
    {
        $admin = Booking::all();
        return $this->successResponse($admin, 'Success');
    }
}
