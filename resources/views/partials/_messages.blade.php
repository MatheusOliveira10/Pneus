@if (Session::has('success'))
	
	<div class="alert alert-success" role="alert">
		<strong>Sucesso:</strong> {{ Session::get('success') }}
	</div>

@endif

@if (Session::has('danger'))
	
	<div class="alert alert-danger" role="alert">
		<strong>Erro:</strong> {{ Session::get('danger') }}
	</div>

@endif

@if (Session::has('warning'))
	
	<div class="alert alert-warning" role="alert">
		<strong>Atenção:</strong> {{ Session::get('warning') }}
	</div>

@endif

@if (count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach  
		</ul>
	</div>

@endif