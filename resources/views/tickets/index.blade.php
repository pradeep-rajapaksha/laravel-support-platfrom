@extends('layouts.app')

@section('content')
<div class="col-md-9">
	<div class="card">
	    <div class="card-header">
	    	Tickets
	    	<div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
		    	<a href="{{ route('tickets.index', array_merge(request()->all(), ['status' => ''])) }}" class="btn btn-primary btn-sm {{ request()->status == '' ? 'active' : '' }}">All</a>
		    	<a href="{{ route('tickets.index', array_merge(request()->all(), ['status' => 'open'])) }}" class="btn btn-primary btn-sm {{ request()->status == 'open' ? 'active' : '' }}">Open</a>
				<a href="{{ route('tickets.index', array_merge(request()->all(), ['status' => 'closed'])) }}" class="btn btn-primary btn-sm {{ request()->status == 'closed' ? 'active' : '' }}">Closed</a>
			</div>

	    	<form class="form-inline float-right mr-2">
	    		<label class="sr-only" for="inlineFormInputName2">Customer name</label>
  				<input type="text" class="form-control form-control-sm mb-2 mr-sm-2" id="inlineFormInputName2" name="search" placeholder="Search..." value="{{ request()->search }}">

  				<button type="submit" class="btn btn-primary btn-sm mb-2">Search</button>
	    	</form>
	    </div>

	    <div class="card-body">
	        @if (session('flash_message_success'))
	            <div class="alert alert-success" role="alert">
	                {{ session('flash_message_success') }}
	            </div>
	        @endif

	        <div>
	        	<table class="table">
	        		<thead>
	        			<tr>
	        				<th>Reference </th> 
	        				<th>Description</th> 
	        				<th>Customer </th> 
	        				<th>Status</th> 
	        				<th></th> 
	        			</tr> 
	        		</thead>
	        		<tbody>
	        			@if (!$tickets->count())
		        			<tr colspan="4">
		        				<td>No Tickets Fouond.</td>
		        			</tr>
		        		@endif
		        		@foreach ($tickets as $ticket)
		        			<tr>
		        				<td><a href="{{ route('tickets.show',$ticket->reference) }}">{{ $ticket->reference }}</a></td>
		        				<td>{{ strlen($ticket->description) > 30 ? substr($ticket->description, 0, 30).'...' : $ticket->description }}</td>
		        				<td>{{ $ticket->customer->name }}</td>
		        				<td>
		        					@if($ticket->status === 'open') <span class="badge badge-secondary">{{ 'Open' }}</span> @endif
		        					@if($ticket->status === 'closed') <span class="badge badge-success">{{ 'Closed' }}</span> @endif
		        				</td>
		        				<td></td>
		        			</tr>
		        		@endforeach
	        		</tbody>
	        	</table>
	        	<div>
	        		{{ $tickets->render() }}
	        	</div>
	        </div>
	    </div>
	</div>
</div>
@endsection
