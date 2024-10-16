@extends('layouts.admin')

@section('page')
    Postulantes
@endsection

@section('css')
    <style>
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="card card-flush">
            <div class="card-body">
                <div class="col-12">
                    <table id="table-usuario" width="100%" class="table table-row-dashed tabla_datos">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2"></th>
                                <th class="w-10px pe-2"></th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Nombre Completo</th>
                                <th class="min-w-125px">Puntuación</th>
                                <th class="min-w-125px">Fecha de registro</th>
                                <th class="text-end" width="60px">Acción</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const columns = [{
                title: "",
                data: "id",
            },
            {
                title: "",
                data: "url_foto",
                render: function(data, type, row) {
                    return `<img src="${data}" class="rounded h-30px my-n1 mx-n1"/>`;
                },
            },
            {
                title: "EMAIL",
                data: "email",
            },
            {
                title: "NOMBRE COMPLETO",
                data: "full_name",
            },
            {
                title: "PUNTUACIÓN",
                data: null,
                render: function(data, type, row) {
                    return row.evaluacion ? row.evaluacion.puntuacion : ''
                }
            },
            {
                title: "FECHA DE REGISTRO",
                data: "fecha_registro_t",
            },
            {
                title: "ACCIONES",
                data: null,
                render: function(data, type, row) {
                    let url_ver = "{{ route('usuarios.index') }}/" + row.id;
                    let url_destroy = "{{ route('usuarios.index') }}/destroy/" + row.id;
                    return `
                <a href="${url_ver}" class="mx-0 rounded-0 btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                <button class="mx-0 rounded-0 btn btn-info btn-sm pdf" data-id="${
                    row.id
                }"><i class="fa fa-file-pdf"></i></button>
                <button class="mx-0 rounded-0 btn btn-danger btn-sm eliminar" data-nombre="${row.full_name}" data-url="${url_destroy}" data-id="${
                    row.id
                }"><i class="fa fa-trash"></i></button>
            `;
                },
            },
        ];


        const accionesRow = () => {
            // pdf
            $("#table-usuario").on("click", "button.pdf", function(e) {
                e.preventDefault();
                let id = $(this).attr("data-id");
                let url = "{{ route('usuarios.index') }}/pdf/" + id;
                window.open(url, '_blank');
            });
            // eliminar
            $("#table-usuario").on("click", "button.eliminar", function(e) {
                e.preventDefault();
                let nombre = $(this).attr("data-nombre");
                let url = $(this).attr("data-url");
                Swal.fire({
                    title: "¿Quierés eliminar este registro?",
                    html: `<strong>${nombre}</strong>`,
                    showCancelButton: true,
                    confirmButtonColor: "#B61431",
                    confirmButtonText: "Si, eliminar",
                    cancelButtonText: "No, cancelar",
                    denyButtonText: `No, cancelar`,
                }).then(async (result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        deleteUsuario(url);
                    }
                });
            });
        }

        function deleteUsuario(url) {
            fetch(url, {
                    method: "POST",
                    headers: {
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: "success",
                        title: "Correcto",
                        text: "Eliminación correcta",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Aceptar",
                    });
                    setTimeout(() => {
                        window.location.reload();
                    }, 600);
                })
                .catch(err => {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Ocurrió un error inesperado, la operación no se pudo completar",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Aceptar",
                    });
                });
        }

        var datatable = null;

        $(document).ready(function() {
            datatable = initDataTable("#table-usuario", columns, "{{ route('usuarios.index') }}");
            accionesRow();
        });
    </script>
@endsection
