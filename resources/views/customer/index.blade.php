@extends('layouts.app')

@section('content')
<div class="col-md-9">
	<div class="card">
	    <div class="card-header">Customers</div>

	    <div class="card-body">
	        @if (session('status'))
	            <div class="alert alert-success" role="alert">
	                {{ session('status') }}
	            </div>
	        @endif

	        <div>
	        	<table class="table">
	        		<thead>
	        			<tr>
	        				<th>Name </th> 
	        				<th>Email</th> 
	        				<th>Phone</th> 
	        				<th></th> 
	        			</tr> 
	        		</thead>
	        		<tbody>
	        			@if (!$customers->count())
		        			<tr colspan="4">
		        				<td>No Customers Fouond.</td>
		        			</tr>
		        		@endif
		        		@foreach ($customers as $customer)
		        			<tr>
		        				<td>{{ $customer->name }}</td>
		        				<td>{{ $customer->email }}</td>
		        				<td>{{ $customer->phone }}</td>
		        				<td></td>
		        			</tr>
		        		@endforeach
	        		</tbody>
	        	</table>
	        	<div>
	        		{{ $customers->render() }}
	        	</div>
	        </div>
	    </div>
	</div>
</div>
@endsection
