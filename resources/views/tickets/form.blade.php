<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : ''}}">
        {!!  Html::decode(Form::label('name', 'Name <span class="req_star">*</span>', ['class' => 'control-label col-md-12']) ) !!}
        <div class="col-md-12">
            {!!  Form::text('name', null , ['class' => 'form-control', 'required' => 'required'] ) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div> 

    <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : ''}}">
        {!!  Html::decode(Form::label('email', 'Email <span class="req_star">*</span>', ['class' => 'control-label col-md-12']) ) !!}
        <div class="col-md-12">
            {!!  Form::email('email', null , ['class' => 'form-control', 'required' => 'required'] ) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div> 
</div>
<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
        {!!  Html::decode(Form::label('phone', 'Phone Number<span class="req_star">*</span>', ['class' => 'control-label col-md-12']) ) !!}
        <div class="col-md-12">
            {!!  Form::text('phone', null , ['class' => 'form-control', 'required' => 'required'] ) !!}
            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
        </div>
    </div> 
</div>
<div class="row">
    <div class="form-group col-md-12 {{ $errors->has('description') ? 'has-error' : ''}}">
        {!!  Html::decode(Form::label('description', 'Description<span class="req_star">*</span>', ['class' => 'control-label col-md-12']) ) !!}
        <div class="col-md-12">
            {!!  Form::textarea('description', null , ['class' => 'form-control', 'required' => 'required'] ) !!}
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>
    </div> 
</div>
<div class="row">
    <div class="form-group col-md-12">
        <div class="col-md-12"> 
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>