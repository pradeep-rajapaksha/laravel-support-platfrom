@extends('layouts.app')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-header">Welcome</div>

        <div class="card-body">            
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['url' => '/issues', 'class' => 'form-issues-create', 'files' => true]) !!}
                    @include ('tickets.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
