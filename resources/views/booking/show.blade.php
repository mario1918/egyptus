@extends('layouts.app')

@section('template_title')
    {{ $booking->name ?? 'Show Booking' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Booking</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bookings.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tourist Id:</strong>
                            {{ $booking->tourist_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tourguide Id:</strong>
                            {{ $booking->tourguide_id }}
                        </div>
                        <div class="form-group">
                            <strong>Trip Id:</strong>
                            {{ $booking->trip_id }}
                        </div>
                        <div class="form-group">
                            <strong>Activities:</strong>
                            {{ $booking->activities }}
                        </div>
                        <div class="form-group">
                            <strong>Persons:</strong>
                            {{ $booking->persons }}
                        </div>
                        <div class="form-group">
                            <strong>Hotel:</strong>
                            {{ $booking->hotel }}
                        </div>
                        <div class="form-group">
                            <strong>Totalprice:</strong>
                            {{ $booking->totalPrice }}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {{ $booking->notes }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
