@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Pagos</div>
			
		
			<!-- Table -->
			<table class="table">
				<thead>
					<tr>
						<th>Week</th><th>Monto</th>
					</tr>
					
				</thead>
				<tbody>
					@foreach ($pagos as $pago)
					<tr>
						<td>{{ $pago->week }}</td><td> ${{ $pago->netpay }} </td>
					</tr>
					@endforeach
					
				</tbody>
				<!-- <tfooter><tr><td>Total</td><td></td></tr></tfooter> --> 
			</table>
		</div>
		<form method="POST" action="/pagos">
		        {{ csrf_field() }}
		        <div class="form-group">
		            <div class="col-sm-6">
		            <label>Week</label>
		            <input type="number" name="week" id="week" class="form-control" required="required" title="">		                
		            <label>Netpay</label>
		            <input type="decimal" name="netpay" id="netpay" class="form-control" required="required" title="">		                
		            <label>Hours</label>
		            <input type="decimal" name="hours" id="hours" class="form-control" required="required" title="">		                
		            <label>Paydate</label>
		            <input type="date" name="paydate" id="paydate" class="form-control" required="required" title="">		                

				        <button type="submit" class="btn btn-primary">add</button>
		            </div>
				    
				    
		        </div>
	
		
		</form>
	</div>
@endsection