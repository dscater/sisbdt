@extends('layouts.app')
@section('css')
    <style>
        #imagen_p {
            width: 80%;
        }

        .foto_datos_otro {
            width: 120px;
        }
    </style>
@endsection
@section('content')
    <h3 class="text-center text-h4">OTROS DATOS</h3>
    <div class="row">
        <form action="{{ route('datos_otros.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <h4>IDIOMAS</h4>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Idioma</label>
                        <input type="text" id="idioma" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nivel</label>
                        <input type="text" id="nivel" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <button type="button" id="btnAgregarIdioma" class="btn btn-sm btn-primary">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="3%">N°</th>
                            <th>Idioma</th>
                            <th>Nivel de Idioma</th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <tbody id="contenedorIdioma">
                        @if ($datos_otros && count($datos_otros->idiomas) > 0)
                            @foreach ($datos_otros->idiomas as $item)
                                <tr class="fila existe" data-id="{{ $item->id }}">
                                    <td>#</td>
                                    <td>{{ $item->idioma }}</td>
                                    <td>{{ $item->nivel }}</td>
                                    <td><button type="button" class="btn btn-danger btn-sm quitar"><i class="fa fa-times"></i></button></td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="vacio">
                                <td colspan="3" class="text-center">SIN REGISTROS</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <div class="separator separator-content my-14"></div>
                <h4>HABILIDADES</h4>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label>Habilidad/Conocimiento</label>
                        <input type="text" id="habilidad" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <button type="button" id="btnAgregarHabilidad" class="btn btn-sm btn-primary">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="3%">N°</th>
                            <th>Habilidad/Conocimiento</th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <tbody id="contenedorHabilidad">
                        @if ($datos_otros && count($datos_otros->habilidads) > 0)
                            @foreach ($datos_otros->habilidads as $item)
                                <tr class="fila existe" data-id="{{ $item->id }}">
                                    <td>#</td>
                                    <td>{{ $item->habilidad }}</td>
                                    <td><button type="button" class="btn btn-danger btn-sm quitar"><i class="fa fa-times"></i></button></td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="vacio">
                                <td colspan="2" class="text-center">SIN REGISTROS</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <div class="separator separator-content my-14"></div>
                <h4>REFERENCIAS</h4>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Nombre referencia</label>
                        <input type="text" id="nombre" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Celular referencia</label>
                        <input type="text" id="celular" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Correo referencia</label>
                        <input type="text" id="correo" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Cargo referencia</label>
                        <input type="text" id="cargo" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Relación referencia</label>
                        <input type="text" id="relacion" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Descripción</label>
                        <input type="text" id="descripcion" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <button type="button" id="btnAgregarReferencia" class="btn btn-sm btn-primary">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="col-12" style="overflow: auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="3%">N°</th>
                            <th>Nombre Referencia</th>
                            <th>Celular referencia</th>
                            <th>Correo referencia</th>
                            <th>Cargo referencia</th>
                            <th>Relación referencia</th>
                            <th>Descripción</th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <tbody id="contenedorReferencia">
                        @if ($datos_otros && count($datos_otros->referencias) > 0)
                            @foreach ($datos_otros->referencias as $item)
                                <tr class="fila existe" data-id="{{ $item->id }}">
                                    <td>#</td>
                                    <td>{{ $item->nombre_ref }}</td>
                                    <td>{{ $item->cel_ref }}</td>
                                    <td>{{ $item->correo_ref }}</td>
                                    <td>{{ $item->cargo_ref }}</td>
                                    <td>{{ $item->relacion_ref }}</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td><button type="button" class="btn btn-danger btn-sm quitar"><i class="fa fa-times"></i></button></td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="vacio">
                                <td colspan="8" class="text-center">SIN REGISTROS</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3 mx-auto">
                    <button type="submit" class="btn btn-primary w-100">
                        Guardar cambios
                    </button>
                </div>
                <div class="col-md-3 mb-3 mx-auto">
                    <a href="{{ route('inicio') }}" class="btn btn-secondary w-100">
                        Volver
                    </a>
                </div>
            </div>
            <div id="contenedorEliminados"></div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        let nuevo_idioma = `<tr class="fila">
                                    <td>#</td>
                                    <td><span></span><input type="hidden" name="idiomas[]"></td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-danger btn-sm quitar"><i class="fa fa-times"></i></button></td>
                            </tr>`;
        let nueva_habilidad = `<tr class="fila">
                                    <td>#</td>
                                    <td><span></span><input type="hidden" name="habilidads[]"></td>
                                    <td><button type="button" class="btn btn-danger btn-sm quitar"><i class="fa fa-times"></i></button></td>
                            </tr>`;
        let nueva_referencia = `<tr class="fila">
                                    <td>#</td>
                                    <td><span></span><input type="hidden" name="referencias[]"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-danger btn-sm quitar"><i class="fa fa-times"></i></button></td>
                            </tr>`;
        // idioma
        let contenedorIdioma = $("#contenedorIdioma");
        let idioma = $("#idioma");
        let nivel = $("#nivel");
        let btnAgregarIdioma = $("#btnAgregarIdioma")

        // habilidad
        let contenedorHabilidad = $("#contenedorHabilidad");
        let habilidad = $("#habilidad")
        let btnAgregarHabilidad = $("#btnAgregarHabilidad")

        // referencia
        let contenedorReferencia = $("#contenedorReferencia");
        let nombre = $("#nombre");
        let celular = $("#celular");
        let correo = $("#correo");
        let cargo = $("#cargo");
        let relacion = $("#relacion");
        let descripcion = $("#descripcion");
        let btnAgregarReferencia = $("#btnAgregarReferencia");

        let contenedorEliminados = $("#contenedorEliminados");

        $(document).ready(function() {
            verificaIdioma();
            verificaHabilidad();
            verificaReferencia();

            // idioma
            btnAgregarIdioma.click(agregarIdioma);
            contenedorIdioma.on("click", "button.quitar", function(e) {
                e.preventDefault();
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    contenedorEliminados.append(
                        `<input type="hidden" value="${fila.attr("data-id")}" name="eliminados_idioma[]">`
                        )
                }
                fila.remove();
                verificaIdioma();
            })

            // habilidad
            btnAgregarHabilidad.click(agregarHabilidad);
            contenedorHabilidad.on("click", "button.quitar", function(e) {
                e.preventDefault();
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    contenedorEliminados.append(
                        `<input type="hidden" value="${fila.attr("data-id")}" name="eliminados_habilidad[]">`
                        )
                }
                fila.remove();
                verificaHabilidad();
            })

            // referencia
            btnAgregarReferencia.click(agregarReferencia);
            contenedorReferencia.on("click", "button.quitar", function(e) {
                e.preventDefault();
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    contenedorEliminados.append(
                        `<input type="hidden" value="${fila.attr("data-id")}" name="eliminados_referencia[]">`
                        )
                }
                fila.remove();
                verificaReferencia();
            })
        });

        // idioma
        function agregarIdioma() {
            if (idioma.val().trim() != '' && nivel.val().trim() != '') {
                let nuevo = $(nuevo_idioma).clone();
                let dato = {
                    idioma: idioma.val(),
                    nivel: nivel.val()
                }
                nuevo.children("td").eq(1).children("input").val(JSON.stringify(dato));
                nuevo.children("td").eq(1).children("span").text("" + dato.idioma.toUpperCase());
                nuevo.children("td").eq(2).text("" + dato.nivel.toUpperCase());
                contenedorIdioma.append(nuevo);
                verificaIdioma();
                limpiarIdioma();
            } else {
                toastr.error("Completa todos los campos de idioma");
            }
        }

        function limpiarIdioma() {
            idioma.val('');
            nivel.val('');
        }

        function verificaIdioma() {
            let filas = contenedorIdioma.children("tr.fila");
            let cont = 1;
            if (filas.length > 0) {
                contenedorIdioma.children("tr.vacio").remove();
                filas.each(function() {
                    $(this).children("td").eq(0).text(cont);
                    cont++;
                })
            } else {
                contenedorIdioma.html(`<tr class="vacio"><td colspan="3" class="text-center">SIN REGISTROS</td></tr>`);
            }
        }

        // habilidad
        function agregarHabilidad() {
            if (habilidad.val().trim() != '') {
                let nuevo = $(nueva_habilidad).clone();
                let dato = {
                    habilidad: habilidad.val(),
                }
                nuevo.children("td").eq(1).children("input").val(JSON.stringify(dato));
                nuevo.children("td").eq(1).children("span").text("" + dato.habilidad.toUpperCase());
                contenedorHabilidad.append(nuevo);
                verificaHabilidad();
                limpiarHabilidad();
            } else {
                toastr.error("Completa todos los campos de habilidad");
            }
        }

        function limpiarHabilidad() {
            habilidad.val('');
            nivel.val('');
        }

        function verificaHabilidad() {
            let filas = contenedorHabilidad.children("tr.fila");
            let cont = 1;
            if (filas.length > 0) {
                contenedorHabilidad.children("tr.vacio").remove();
                filas.each(function() {
                    $(this).children("td").eq(0).text(cont);
                    cont++;
                })
            } else {
                contenedorHabilidad.html(`<tr class="vacio"><td colspan="2" class="text-center">SIN REGISTROS</td></tr>`);
            }
        }

        // referencia
        function agregarReferencia() {
            if (nombre.val().trim() != '' && celular.val().trim() != '' && correo.val().trim() != '' && cargo.val()
            .trim() != '' && relacion.val().trim() != '' && descripcion.val().trim() != '') {
                let nuevo = $(nueva_referencia).clone();
                let dato = {
                    nombre: nombre.val(),
                    celular: celular.val(),
                    correo: correo.val(),
                    cargo: cargo.val(),
                    relacion: relacion.val(),
                    descripcion: descripcion.val(),
                }
                nuevo.children("td").eq(1).children("input").val(JSON.stringify(dato));
                nuevo.children("td").eq(1).children("span").text("" + dato.nombre.toUpperCase());
                nuevo.children("td").eq(2).text("" + dato.celular.toUpperCase());
                nuevo.children("td").eq(3).text("" + dato.correo.toUpperCase());
                nuevo.children("td").eq(4).text("" + dato.cargo.toUpperCase());
                nuevo.children("td").eq(5).text("" + dato.relacion.toUpperCase());
                nuevo.children("td").eq(6).text("" + dato.descripcion.toUpperCase());
                contenedorReferencia.append(nuevo);
                verificaReferencia();
                limpiarReferencia();
            } else {
                toastr.error("Completa todos los campos de referencia");
            }
        }

        function limpiarReferencia() {
            nombre.val('');
            celular.val('');
            correo.val('');
            cargo.val('');
            relacion.val('');
            descripcion.val('');
        }

        function verificaReferencia() {
            let filas = contenedorReferencia.children("tr.fila");
            let cont = 1;
            if (filas.length > 0) {
                contenedorReferencia.children("tr.vacio").remove();
                filas.each(function() {
                    $(this).children("td").eq(0).text(cont);
                    cont++;
                })
            } else {
                contenedorReferencia.html(`<tr class="vacio"><td colspan="8" class="text-center">SIN REGISTROS</td></tr>`);
            }
        }
    </script>
@endsection
