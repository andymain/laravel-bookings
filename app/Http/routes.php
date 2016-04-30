<?php

use App\Booking;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
Route::get('/', function () {
    return view('welcome');
});
 * /

/**
 * Show Booking Dashboard
 */
Route::get('/', function () {

    $bookings = \App\Booking::orderBy('x', 'asc')->get();

    return view('bookings', [
        'bookings' => $bookings
    ]);
    //
});

/**
 * Add New Booking
 */
Route::post('/booking', function (Request $request) {

    /*$validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }*/

    // Create The Booking...
    $booking = new \App\Booking;
    $booking->name = $request->name;
    $booking->start_time = $request->start_time;
    $booking->end_time = $request->end_time;
    $booking->customer = $request->customer;
    $booking->staff = $request->staff;
    $booking->service = $request->service;

    $booking->save();

    return redirect('/');
});

/**
 * Delete Booking
 */
Route::delete('/booking/{booking}', function (\App\Booking $booking) {
    $booking->delete();

    return redirect('/');
});