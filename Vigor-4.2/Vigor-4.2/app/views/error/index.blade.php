
@extends('templates.error')


@section('main')
<div class="container"> <!-- Holds  the page  -->
	<div class="row"> <!-- creates new row -->
		<div class="col-md-12"> 
			<div class="col-md-11"> <!-- Holds the text question -->
				<p id="error-title">Error: Something Went Wrong  Recalculating Heartbeat...</p>
				<p id="error-subtitle">Please return to the Hub</p>
			</div>
			<div class="col-md-5 col-md-push-3"> <!-- Holds the return button -->
				<a href="{{ route('day') }}" type="button" class="btn btn-default error-button">Back to the Hub</button></a> <!-- returns back to the hub -->
			</div>
		</div>
	</div>
</div>
@stop