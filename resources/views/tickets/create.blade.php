@extends('layouts.app')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-header">Create Ticket</div>

        <div class="card-body"> 
            @if (session('flash_message_success'))
                <div class="alert alert-success" role="alert">
                    {{ session('flash_message_success') }}
                </div>
            @endif        
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['url' => route('tickets.store'), 'class' => 'form-issues-create', 'files' => true]) !!}
                    @csrf
                    @include ('tickets.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
