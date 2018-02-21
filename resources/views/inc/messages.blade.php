{{-- Show Errors --}}
@if( count($errors) > 0 )
<div class="alert alert-danger alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</div>
@endif
{{-- End errors --}}


{{-- Show success message --}}
@if(session('success'))
	<div class="alert alert-success text-center">
		{{ session('success') }}
	</div>
@endif
{{-- End success message --}}

{{-- Show custom error message --}}
@if(session('error'))
	<div class="alert alert-danger text-center">
		{{ session('error') }}
	</div>
@endif
{{-- End custom error message --}}