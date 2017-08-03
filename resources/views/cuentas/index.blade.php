@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Cuenta de gustavo</div>
			
		
			<!-- Table -->
			<table class="table">
				<thead>
					<tr>
						<th>Fecha</th><th>Monto</th>
					</tr>
					
				</thead>
				<tbody>
					@foreach ($cuentas as $cuenta)
					<tr>
						<td>{{ $cuenta->date }}</td><td> ${{$cuenta->amount}} </td>
					</tr>
					@endforeach
					
				</tbody>
				<tfooter><tr><td>Total</td><td>${{$total}}</td></tr></tfooter>
			</table>
		</div>
		<form method="POST" action="/cuentas">
		        {{ csrf_field() }}
		        <div class="form-group">
		            <div class="col-sm-6">
		            <label>Monto</label>
		                <input type="text" name="monto" id="inputmonto" class="form-control" required="required" title="">		                
				        <button type="submit" class="btn btn-primary">add</button>
		            </div>
				    
				    
		        </div>
	
		
		</form>
	</div>
@endsection