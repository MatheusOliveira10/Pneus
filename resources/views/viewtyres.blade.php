<?php 
dd($pneus);
?>
@extends('main') @section('title', '| INICIO') @section('content')
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <table id="pneus" class="table table-responsive table-hover">
                        <thead>
                            <th scope="col">Foto</th>
                            <th scope="col">Id</th>
                            <th scope="col">Medida</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Data de Registro</th>
                            <th scope="col">Horario de Registro</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($pneus as $pneu)
                            <tr>
                                <td scope="col">{{$pneu->foto}}</td>
                                <td>{{$pneu->id}}</td>
                                <td>@foreach($medtyres as $medtyre) @if ($medtyre->id === $pneu->medtyre_id)
                                    {{$medtyre->name}} @endif @endforeach</td>
                                <td>{{$pneu->cod}}</td>
                                <td>{{$pneu->created_at}}</td>
                                <td>{{$pneu->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                    @endsection
                    @section('scripts')
                    {!! Html::script('js/main.js')!!}
                    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

                    <script type="text/javascript">
                        $('#produtos').dataTable();
                    </script>
                    @endsection