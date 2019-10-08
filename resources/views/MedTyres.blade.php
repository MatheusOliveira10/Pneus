@extends('main') 
@section('title', '| Cadastro de Medidas') 
@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <div class="card">
                <h2 class="card-header text-center">Pneus Cadastrados</h2>
                <a class="btn btn-default" href="/cadastMedidas">Novo</a>
                <div class="card-body">
                    <table id="pneus" class="table table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Abreviação</th>
                        </thead>
                        <tbody>
                            @foreach($medtyres as $medtyre)
                                <tr>
                                    <td>{{$medtyre->id}}</td>
                                    <td scope="col">{{$medtyre->name}}</td>
                                        <td>{{$medtyre->type}}</td>
                                        <td>{{$medtyre->abbr}}</td>
                                    </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm"></div>
    
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('js/main.js')!!}
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function (){
           $('#pneus').DataTable({
               language: {
                   "sEmptyTable": "Nenhum registro encontrado",
                   "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
	               "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                   "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                   "sInfoPostFix": "",
                   "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
	                    "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
	               "oAria": {
		               "sSortAscending": ": Ordenar colunas de forma ascendente",
		               "sSortDescending": ": Ordenar colunas de forma descendente"
	               }
               }
           }
           );
       });
    </script>
@endsection