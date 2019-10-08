@extends('main')
@section('title', '| Visualização de Pneu')
@section('content')
		<input type="hidden" id="cod" name="cod" value="{{$pneu->cod}}">
	<div class="card">
			<a href="/view/" aria-label="align-center">
					<button type="button" class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-arrow-left"></span>
						  </button>
			</a>
		<h2 class="card-header text-center">Código: {{$pneu->cod}}</h2>
		<img class="card-img-top" src="\\{{public_path('pneus\\')}}{{$pneu->foto}}">
		<div class="card-body">
			<ul class="list-group">
				<li class="list-group-item"><b>ID: {{$pneu->id}}</b></li>
				<li class="list-group-item"><b>Dia em que foi cadastrado: {{$pneu->created_at->toDateString()}}</b></li>
				<li class="list-group-item"><b>Hora em que foi cadastrado: {{$pneu->created_at->toTimeString()}}</b></li>
			</ul>
			&nbsp;
			<form method="post" action="{{url('/reprint')}}">
			<input type="hidden" value="{{csrf_token()}}" name="_token" />
			<input type="hidden" name="cod" value="{{$pneu->cod}}"/>
			<input type="hidden" name="id" value="{{$pneu->id}}"/>
			<button type="submit" class="btn btn-block btn-primary">Imprimir novamente</button>
</form>
		</div>
	</div>
@endsection
@section('scripts')
	{!! Html::script('js/main.js')!!}
@endsection