@extends('layouts.app')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-header">Welcome</div>
        <div class="card-body">            
            @if (session('flash_message_success'))
                <div class="alert alert-success" role="alert">
                    {{ session('flash_message_success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                {!! Form::open(['method' => 'GET', 'url' => route('tickets.track'), 'class' => 'form-issues-track form-inline', 'files' => true]) !!}
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    {!!  Html::decode(Form::label('reference', 'Support Ticket Reference: ', ['class' => 'control-label my-1 mr-2']) ) !!}

                    {!!  Form::text('reference', null , ['class' => 'form-control mx-2', 'required' => 'required'] ) !!}
                    
                    {!! Form::submit('Track Issue', ['class' => 'btn btn-primary my-1 ml-1']) !!}
                </div> 
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
