@extends('layouts.app')

@section('template_title')
    {{ $activity->name ?? 'Show Activity' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Activity</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('activities.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $activity->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
