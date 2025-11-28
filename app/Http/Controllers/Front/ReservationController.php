<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function create()
    {
        return view('front.reservation.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'reservation_date' => 'required|date|after:today',
            'reservation_time' => 'required',
            'guests_count' => 'required|integer|min:1|max:20',
            'special_requests' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Reservation::create($request->all());

        return redirect()->route('reservation.success')
            ->with('success', 'Votre réservation a été soumise avec succès ! Nous vous contacterons pour confirmation.');
    }

    public function success()
    {
        return view('front.reservation.success');
    }
}
