@extends('layouts.app')

@section('template_title')
    {{ $tourguide->name ?? 'Show Tourguide' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tourguide</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tourguides.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $tourguide->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Profileimg:</strong>
                            {{ $tourguide->profileImg }}
                        </div>
                        <div class="form-group">
                            <strong>Languages:</strong>
                            {{ $tourguide->languages }}
                        </div>
                        <div class="form-group">
                            <strong>Bio:</strong>
                            {{ $tourguide->bio }}
                        </div>
                        <div class="form-group">
                            <strong>Activities:</strong>
                            {{ $tourguide->activities }}
                        </div>
                        <div class="form-group">
                            <strong>Pricerate:</strong>
                            {{ $tourguide->priceRate }}
                        </div>
                        <div class="form-group">
                            <strong>Video:</strong>
                            {{ $tourguide->video }}
                        </div>
                        <div class="form-group">
                            <strong>Cities:</strong>
                            {{ $tourguide->cities }}
                        </div>
                        <div class="form-group">
                            <strong>Personalrate:</strong>
                            {{ $tourguide->personalRate }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
