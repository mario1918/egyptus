<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $tourguide->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('profileImg') }}
            {{ Form::text('profileImg', $tourguide->profileImg, ['class' => 'form-control' . ($errors->has('profileImg') ? ' is-invalid' : ''), 'placeholder' => 'Profileimg']) }}
            {!! $errors->first('profileImg', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('languages') }}
            {{ Form::text('languages', $tourguide->languages, ['class' => 'form-control' . ($errors->has('languages') ? ' is-invalid' : ''), 'placeholder' => 'Languages']) }}
            {!! $errors->first('languages', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bio') }}
            {{ Form::text('bio', $tourguide->bio, ['class' => 'form-control' . ($errors->has('bio') ? ' is-invalid' : ''), 'placeholder' => 'Bio']) }}
            {!! $errors->first('bio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activities') }}
            {{ Form::text('activities', $tourguide->activities, ['class' => 'form-control' . ($errors->has('activities') ? ' is-invalid' : ''), 'placeholder' => 'Activities']) }}
            {!! $errors->first('activities', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rate') }}
            {{ Form::text('rate', $tourguide->rate, ['class' => 'form-control' . ($errors->has('rate') ? ' is-invalid' : ''), 'placeholder' => 'Rate']) }}
            {!! $errors->first('rate', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('video') }}
            {{ Form::text('video', $tourguide->video, ['class' => 'form-control' . ($errors->has('video') ? ' is-invalid' : ''), 'placeholder' => 'Video']) }}
            {!! $errors->first('video', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activity_id') }}
            {{ Form::text('activity_id', $tourguide->activity_id, ['class' => 'form-control' . ($errors->has('activity_id') ? ' is-invalid' : ''), 'placeholder' => 'Activity Id']) }}
            {!! $errors->first('activity_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>