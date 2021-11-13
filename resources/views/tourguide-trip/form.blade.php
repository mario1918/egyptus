<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tourguide_id') }}
            {{ Form::text('tourguide_id', $tourguideTrip->tourguide_id, ['class' => 'form-control' . ($errors->has('tourguide_id') ? ' is-invalid' : ''), 'placeholder' => 'Tourguide Id']) }}
            {!! $errors->first('tourguide_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $tourguideTrip->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $tourguideTrip->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activities') }}
            {{ Form::text('activities', $tourguideTrip->activities, ['class' => 'form-control' . ($errors->has('activities') ? ' is-invalid' : ''), 'placeholder' => 'Activities']) }}
            {!! $errors->first('activities', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hours') }}
            {{ Form::text('hours', $tourguideTrip->hours, ['class' => 'form-control' . ($errors->has('hours') ? ' is-invalid' : ''), 'placeholder' => 'Hours']) }}
            {!! $errors->first('hours', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fair') }}
            {{ Form::text('fair', $tourguideTrip->fair, ['class' => 'form-control' . ($errors->has('fair') ? ' is-invalid' : ''), 'placeholder' => 'Fair']) }}
            {!! $errors->first('fair', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>