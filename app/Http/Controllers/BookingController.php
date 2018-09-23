<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\ShowTime;
use App\Seat;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function stepOne(Request $request)
    {
        $shows = ShowTime::where('slot', '>=', now())->get();
        $show_id = $request->session()->get('show_id');
        return view('user.booking.create-step1', compact('show_id', 'shows'));
    }

    public function postStepOne(Request $request)
    {
        $rules = [
            'slot_id' => 'required|exists:show_times,id',
        ];
        $validatedData = $request->validate($rules);

        $request->session()->put('show_id', $request->slot_id);
        return redirect(route('user.booking.step2'));
    }

    public function stepTwo(Request $request)
    {
        $seats = Seat::all();
        $show_id = $request->session()->get('show_id');
        if (empty($show_id)) {
            return redirect(route('user.booking.step1'));
        }
        $bookings = Booking::where('slot_id', $show_id)->pluck('seat_id')->all();
        return view('user.booking.create-step2', compact('show_id', 'seats', 'bookings'));
    }

    public function postStepTwo(Request $request)
    {
        $rules = [
            'seat_id' => 'required|exists:seats,id'
        ];
        $validatedData = $request->validate($rules);

        $show_id = $request->session()->get('show_id');
        $seats = $request->get('seat_id');
        foreach ($seats as $seat) {
            $booked = Booking::where(['slot_id' => $show_id, 'seat_id' => $seat])->get();
            if ($booked->isNotEmpty()) {
                Session::flash('flash_error_msg', 'Seat already booked');
                return redirect(route('user.booking.step2'));
            }
            Booking::create(
                [
                    'seat_id' => $seat,
                    'slot_id' => $show_id,
                    'user_id' => Auth::id()
                ]
            );
        }
        $request->session()->forget('show_id');
        return redirect(route('user.bookings'));
    }

    public function userBookings()
    {
        $bookings = Booking::whereHas('show', function ($q) {
            $q->where('slot', '>=', now());
        })->where('user_id', Auth::id())->get();

        return view('user.booking.index', compact('bookings'));
    }
}
