@extends('main')
@section('title', '| INICIO')
@section('content')

<div class="container">
    <div class="row"></div>
    <div class="row">
        <div class="col"></div>
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4 align-middle">Registre o pneumático!</h1>
                        <div id="mycamera" style="width:320px; height:240px;"></div>
                        <a class="btn btn-primary" onclick="TakeSnap()" data-toggle="modal" data-target="#myModal">Tirar Foto</a>
                    </div>
                </div>                      
            </div>
        <div class="col"></div>
    </div>
</div>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Informações</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label for="myresult">Foto:</label>
            <div id="myresult" style="width:320px; height:240px;"></div>
            <form action="{{route('tyres.store')}}" method="POST">
                {{ csrf_field() }}
                <label for="medpneus">Medida do Pneu:</label>
                <select name="medpneus" id="medpneus" class="form-control">
                    @foreach($medpneus as $medpneu)
                        <option value="{{$medpneu->id}}">{{$medpneu->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" id="foto" name="foto">
                <button type="submit">Enviar</button>
            </form>     
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
{!! Html::script('js/webcam.js') !!}
<script>
    Webcam.attach('#mycamera');
    function TakeSnap()
    {
        Webcam.snap( function(dataUri)
        {
            document.getElementById('myresult').innerHTML = '<img src="'+dataUri+'"/>';

            var raw_image_data = dataUri.replace(/^data\:image\/\w+\;base64\,/, '');
		
		    document.getElementById('foto').value = raw_image_data;
        });
    }
</script>

@endsection
