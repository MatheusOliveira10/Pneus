@extends('main') @section('title', '| INICIO') @section('content')
<div class="container">
    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="align-content:center;">
            <div class="card text-white bg-secondary" style="width:100%; height:auto;">
                <div class="card-body">
                    <h1 class="display-6 text-center">Registro de Pneus</h1>
                    <hr>
                    <div id="mycamera"></div>
                    <form action="{{route('tyres.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mt-1" for="medpneus">Medida do Pneu:</label>
                            <select name="medpneus" id="medpneus" class="js-example-basic-single js-states form-control">
                                @foreach($medpneus as $medpneu)
                            <option value="{{$medpneu->id}}">{{$medpneu->name}} - {{$medpneu->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" id="foto" name="foto">
                        <div class="form-group">
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-9">
                            <button class="btn btn-primary mt-1" id="takeSnap" onclick="TakeSnap()" data-toggle="modal" data-target="#myModal">Tirar
                                Foto
                            </button>
                        </div>
                        <div class="col-md-3 right">
                            <button class="btn btn-success mt-1" id="showCamera" onclick="showCamera()">Mostrar</button>
                            <button class="btn btn-warning mt-1" id="hideCamera" onclick="hideCamera()">Esconder</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="myModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Imagem:</h5>
                    <button type="button" action="{{route('home')}}" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <label for="myresult"></label>
                            <div id="myresult"></div>
                            <button class="btn btn-primary mt-2" id="submitt" onclick="submit()">Enviar</button>
                            <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection @section('scripts') {!! Html::script('js/webcam.js') !!} {!! Html::script('js/select2.js') !!} {!! Html::script('js/main.js')
!!} {!! Html::style('css/select2.css') !!}
<script>
    Webcam.reset();
    Webcam.set({
		width: 560,
		height: 480,
		dest_width: 560,
		dest_height: 480,
		image_format: 'jpeg',
		jpeg_quality: 100,
		fps: 60
	});
    Webcam.attach('#mycamera');
</script>
<script>
    $(document).ready(function () {
        $('#medpneus').select2();
        $(document).keypress(function (e) {
            if (e.which == 13) $('#takeSnap').click();
        });
    });
</script> 
@endsection