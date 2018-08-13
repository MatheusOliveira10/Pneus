@extends('main') @section('title', '| INICIO') @section('content')

<div class="container">
    <div class="row"></div>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-6 text-center">Registre o pneu!</h1>
                    <div id="mycamera" style="width:640px; height:480px;"></div>
                    <button class="btn btn-primary mt-1" id="takeSnap" onclick="TakeSnap()" data-toggle="modal" data-target="#myModal">Tirar Foto</button>
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
                <button type="button" action="{{route('home')}}" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="myresult">Foto:</label>
                <div id="myresult" style="width:640px; height:480px;"></div>
                <form action="{{route('tyres.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="medpneus">Medida do Pneu:</label>
                        <select name="medpneus" id="medpneus" class="js-example-basic-single js-states form-control">
                            @foreach($medpneus as $medpneu)
                            <option value="{{$medpneu->id}}">{{$medpneu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="foto" name="foto">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts') {!! Html::script('js/webcam.js') !!} {!! Html::script('js/select2.js') !!} {!! Html::style('css/select2.css') !!}
<script>
    Webcam.attach('#mycamera');
    function TakeSnap() {
        Webcam.snap(function (dataUri) {
            document.getElementById('myresult').innerHTML = '<img src="' + dataUri + '"/>';

            var raw_image_data = dataUri.replace(/^data\:image\/\w+\;base64\,/, '');

            document.getElementById('foto').value = raw_image_data;
        });
    }
</script>
<script>
    $(document).ready(function () {
        $('#medpneus').select2({
            dropdownParent: $('#myModal')
        });
        $(document).keypress(function (e) {
            if (e.which == 13) $('#takeSnap').click();
        });
    });
</script> @endsection