@extends('main')
@section('title', '| INICIO')
@section('content')
    <div class="card">
        <h2 class="card-header text-center">Pneus Cadastrados</h2>
        <div class="card-body">
            <table id="pneus" class="table table-hover">
	            <thead>
	                <th>Id</th>
	                <th>Foto</th>
	                <th>Medida</th>
	                <th>Código</th>
	                <th>Data de Registro</th>
	                <th>Horário de Registro</th>
	            </thead>
	            <tbody>
	                @foreach($pneus as $pneu)
		                <tr>
			                <td>{{$pneu->id}}</td>
			                <td scope="col">{{$pneu->foto}}</td>
			                <td>
				                @foreach($medtyres as $medtyre) @if ($medtyre->id === $pneu->medtyre_id){{$medtyre->name}} @endif @endforeach</td>
                                <td>{{$pneu->cod}}</td>
                                <td>{{$pneu->created_at->toDateString()}}</td>
                                <td>{{$pneu->created_at->toTimeString()}}</td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
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