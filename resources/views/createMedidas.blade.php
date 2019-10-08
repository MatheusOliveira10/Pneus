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
        <div style="justify-content: center; align-items: center; display: flex; flex-direction: row;">
                <form method="post" action="{{url('/cadastMedidas')}}">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="Nome">Nome:</label>
                        <input type="text" class="form-control" name="nome"/>
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo:</label>
                        <input type="text" class="form-control" name="type"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    </form>
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