@extends('layouts.app')

@section('template_title')
    {{ $tourist->name ?? 'Show Tourist' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tourist</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tourists.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $tourist->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
