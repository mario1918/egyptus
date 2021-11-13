@extends('layouts.app')

@section('template_title')
    {{ $tourguideTrip->name ?? 'Show Tourguide Trip' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tourguide Trip</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tourguide-trips.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tourguide Id:</strong>
                            {{ $tourguideTrip->tourguide_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $tourguideTrip->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $tourguideTrip->description }}
                        </div>
                        <div class="form-group">
                            <strong>Activities:</strong>
                            {{ $tourguideTrip->activities }}
                        </div>
                        <div class="form-group">
                            <strong>Hours:</strong>
                            {{ $tourguideTrip->hours }}
                        </div>
                        <div class="form-group">
                            <strong>Fair:</strong>
                            {{ $tourguideTrip->fair }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
