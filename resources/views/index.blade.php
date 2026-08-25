@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Clases / Estudiantes</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="tablaDetalle"> <!-- -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Programación Web</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts') <!-- -->
<script>
    $(document).ready(function() {
        $('#tablaDetalle').DataTable({ //
            "language": {
                "info": "Mostrando _TOTAL_ registros", //
                "search": "Buscar:", //
                "paginate": {
                    "next": "Siguiente", //
                    "previous": "Anterior" //
                },
                "lengthMenu": 'Mostrar <select class="custom-select custom-select-sm form-control form-control-sm">' + //
                    '<option value="5">5</option>' +
                    '<option value="10">10</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> registros',
                "loadingRecords": "Cargando...", //
                "processing": "Procesando...", //
                "emptyTable": "No hay datos", //
                "zeroRecords": "No se encontraron resultados" //
            }
        });
    });
</script>
@endpush <!-- -->