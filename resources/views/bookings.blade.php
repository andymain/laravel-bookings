<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 30/04/2016
 * Time: 20:10
 */

 ?>

 <!-- resources/views/bookings.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Create bookings Form... -->
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Booking Form -->
        <form action="{{ url('booking') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Booking Name -->
            <div class="form-group">
                <label for="Booking" class="col-sm-3 control-label">Booking</label>
                  <div class="col-sm-6">
                <input type="text" name="name" id="Booking-name" class="form-control">
                </div>
                 </div>

                             <div class="form-group">
                <label for="Start-Time" class="col-sm-3 control-label">Start Time</label>
                  <div class="col-sm-6">
                  <input type="text" name="start_time" id="Start-time" class="form-control">
                  </div>
                    </div>

                <div class="form-group">
                <label for="End-time" class="col-sm-3 control-label">End Time</label>
                  <div class="col-sm-6">
                  <input type="text" name="end_time" id="End-time" class="form-control">
                  </div>
                    </div>

                <div class="form-group">
                <label for="Service" class="col-sm-3 control-label">Service</label>
                  <div class="col-sm-6">
                     <input type="text" name="service" id="Service" class="form-control">
                     </div>
                       </div>

                 <div class="form-group">
                <label for="Customer" class="col-sm-3 control-label">Customer</label>
                  <div class="col-sm-6">
                      <input type="text" name="customer" id="Customer" class="form-control">
                      </div>
                        </div>

                 <div class="form-group">
                <label for="Staff" class="col-sm-3 control-label">Staff</label>
                <div class="col-sm-6">
                    <input type="text" name="staff" id="Staff" class="form-control">
                    </div>
                      </div>



            <!-- Add Booking Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Booking
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Bookings -->
    @if (count($bookings) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Bookings
            </div>

            <div class="panel-body">
                <table class="table table-striped Booking-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Booking</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Service</th>
                        <th>Customer</th>
                        <th>Staff</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <!-- Booking Name -->
                                <td class="table-text">
                                    <div>{{ $booking->name }}</div>
                                    </td>
                                      <td class="table-text">
                                     <div>{{ $booking->start_time }}</div>
                                       </td>
                                            <td class="table-text">
                                      <div>{{ $booking->end_time }}</div>
                                        </td>
                                              <td class="table-text">
                                       <div>{{ $booking->service }}</div>
                                         </td>
                                            <td class="table-text">
                                        <div>{{ $booking->customer }}</div>
                                          </td>
                                            <td class="table-text">
                                         <div>{{ $booking->staff }}</div>
                                </td>



                                        <!-- Delete Button -->
                                        <td>
                                            <form action="{{ url('booking/'.$booking->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection