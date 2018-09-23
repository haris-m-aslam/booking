<?php

namespace App\Http\Controllers;

use App\ShowTime;
use Illuminate\Http\Request;
use App\Film;
use App\Booking;
use App\Seat;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showtimes = ShowTime::where('slot', '>=', now())->get();
        return view('admin.showtimes.index', compact('showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Film::all();
        return view('admin.showtimes.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'slot' => 'bail|required|date_format:"Y-m-d H:i:s"|unique:show_times',
            'film_id' => 'exists:films,id',
        ];
        $request->validate($rules);

        ShowTime::create($request->all());
        return redirect(route('show-times.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function show(ShowTime $showTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function edit(ShowTime $showTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShowTime $showTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowTime $showTime)
    {
        //
    }

    public function showBookings(ShowTime $showTime){
        // $bookings = Booking::where('slot_id', $id)->get();
        // $showTime = ShowTime::find($id);
        $totalSeats = Seat::get()->count();
        $film = $showTime->film;
        $bookings = $showTime->bookings;
        $timing = $showTime->slot;
        return view('admin.showtimes.bookings', compact('bookings', 'timing', 'totalSeats'));
    }

    public function pastShows(){
        $showtimes = ShowTime::where('slot', '<', now())->get();
        return view('admin.showtimes.past', compact('showtimes'));
    }
}
