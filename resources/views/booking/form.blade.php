<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tourist_id') }}
            {{ Form::text('tourist_id', $booking->tourist_id, ['class' => 'form-control' . ($errors->has('tourist_id') ? ' is-invalid' : ''), 'placeholder' => 'Tourist Id']) }}
            {!! $errors->first('tourist_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tourguide_id') }}
            {{ Form::text('tourguide_id', $booking->tourguide_id, ['class' => 'form-control' . ($errors->has('tourguide_id') ? ' is-invalid' : ''), 'placeholder' => 'Tourguide Id']) }}
            {!! $errors->first('tourguide_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('trip_id') }}
            {{ Form::text('trip_id', $booking->trip_id, ['class' => 'form-control' . ($errors->has('trip_id') ? ' is-invalid' : ''), 'placeholder' => 'Trip Id']) }}
            {!! $errors->first('trip_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activities') }}
            {{ Form::text('activities', $booking->activities, ['class' => 'form-control' . ($errors->has('activities') ? ' is-invalid' : ''), 'placeholder' => 'Activities']) }}
            {!! $errors->first('activities', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('persons') }}
            {{ Form::text('persons', $booking->persons, ['class' => 'form-control' . ($errors->has('persons') ? ' is-invalid' : ''), 'placeholder' => 'Persons']) }}
            {!! $errors->first('persons', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hotel') }}
            {{ Form::text('hotel', $booking->hotel, ['class' => 'form-control' . ($errors->has('hotel') ? ' is-invalid' : ''), 'placeholder' => 'Hotel']) }}
            {!! $errors->first('hotel', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('totalPrice') }}
            {{ Form::text('totalPrice', $booking->totalPrice, ['class' => 'form-control' . ($errors->has('totalPrice') ? ' is-invalid' : ''), 'placeholder' => 'Totalprice']) }}
            {!! $errors->first('totalPrice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('notes') }}
            {{ Form::text('notes', $booking->notes, ['class' => 'form-control' . ($errors->has('notes') ? ' is-invalid' : ''), 'placeholder' => 'Notes']) }}
            {!! $errors->first('notes', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>