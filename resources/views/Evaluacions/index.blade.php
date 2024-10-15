@extends('layouts.app')
@section('css')
    <link href="{{ asset('assets/jquery-smartwizard-master/dist/css/smart_wizard_all.min.css') }}" rel="stylesheet"
        type="text/css" />
    </link>
    <style>
        #imagen_p {
            width: 80%;
        }

        .foto_evaluacion {
            width: 120px;
        }

        #smartwizard {
            transition: all 0.3s;
            height: auto !important;
        }

        .row.fila {
            position: relative;
        }

        .row.fila .quitar {
            border: solid 1px #ff3300;
            background: #e02d00;
            border-radius: 4px;
            color: white;
            position: absolute !important;
            right: 5px;
            top: 5px;
            width: 20px;
            text-align: center;
            padding: 2px;
            transition: all 0.3s;
        }

        .row.fila .quitar:hover {
            background: #ff3300;
        }
    </style>
@endsection
@section('content')
    <h3 class="text-center text-h4">REGISTRO</h3>
    <div class="row">
        <div class="col-12">
            <!-- SmartWizard html -->
            <div id="smartwizard">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#step-1">
                            <div class="num">1</div>
                            Formación básica
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-2">
                            <span class="num">2</span>
                            Formación carrera
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-3">
                            <span class="num">3</span>
                            Formación postgrado
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#step-4">
                            <span class="num">4</span>
                            Cursos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#step-5">
                            <span class="num">5</span>
                            Experiencia laboral
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#step-6">
                            <span class="num">6</span>
                            Distinciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#step-7">
                            <span class="num">7</span>
                            Idiomas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#step-8">
                            <span class="num">8</span>
                            Habilidades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#step-9">
                            <span class="num">9</span>
                            Cualidades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#step-10">
                            <span class="num">10</span>
                            Referencias
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                        @include('Evaluacions.parcial.paso1')
                    </div>
                    <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                        @include('Evaluacions.parcial.paso2')
                    </div>
                    <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                        @include('Evaluacions.parcial.paso3')
                    </div>
                    <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                        @include('Evaluacions.parcial.paso4')
                    </div>
                    <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                        @include('Evaluacions.parcial.paso5')
                    </div>
                    <div id="step-6" class="tab-pane" role="tabpanel" aria-labelledby="step-6">
                        @include('Evaluacions.parcial.paso6')
                    </div>
                    <div id="step-7" class="tab-pane" role="tabpanel" aria-labelledby="step-7">
                        @include('Evaluacions.parcial.paso7')
                    </div>
                    <div id="step-8" class="tab-pane" role="tabpanel" aria-labelledby="step-8">
                        @include('Evaluacions.parcial.paso8')
                    </div>
                    <div id="step-9" class="tab-pane" role="tabpanel" aria-labelledby="step-9">
                        @include('Evaluacions.parcial.paso9')
                    </div>
                    <div id="step-10" class="tab-pane" role="tabpanel" aria-labelledby="step-10">
                        @include('Evaluacions.parcial.paso10')
                    </div>
                </div>

                <!-- Include optional progressbar HTML -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        @if ($evaluacion && $datos_otro && Auth::user()->tipo == 'POSTULANTE')
            <div class="col-md-4 mt-3 offset-md-8">
                <a href="{{ route('usuarios.pdf', Auth::user()->id) }}" target="_blank"
                    class="btn btn-primary btn-sm w-100 btn-block"><i class="fa fa-file-pdf"></i> Generar pdf</a>
            </div>
        @endif
    </div>

    @if ($evaluacion && $datos_otro)
        <input type="hidden" id="txtButtonFinalizar" value="Actualizar información">
        <input type="hidden" id="estadoButtonFinalizar" value="">
    @else
        <input type="hidden" id="txtButtonFinalizar" value="Finalizar registro">
        <input type="hidden" id="estadoButtonFinalizar" value="disabled">
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('assets/jquery-smartwizard-master/dist/js/jquery.smartWizard.min.js') }}"></script>
    <script>
        let form_1 = $("#form-1");
        let form_2 = $("#form-2");
        let form_3 = $("#form-3");
        let form_4 = $("#form-4");
        let form_5 = $("#form-5");
        let form_6 = $("#form-6");
        let form_7 = $("#form-7");
        let form_8 = $("#form-8");
        let form_9 = $("#form-9");
        let form_10 = $("#form-10");

        $(document).ready(function() {
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                lang: {
                    next: 'Siguiente',
                    previous: 'Anterior'
                },
                toolbar: {
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true, // show/hide a Previous button
                    position: 'bottom', // none/ top/ both bottom
                    extraHtml: `<button class="btn btn-success" id="btnFinish" ${$("#estadoButtonFinalizar")} onclick="onConfirm()">${$("#txtButtonFinalizar").val()}</button>`
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation 
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
                disabledSteps: [],
            });

            $('#wizard').smartWizard({
                enableAllSteps: true
            });

            @if ($evaluacion && $datos_otro)
                $('#smartwizard').smartWizard("goToStep", 9, true);
            @else
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
            @endif

            // Leave step event is used for validating the forms
            $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIdx, nextStepIdx,
                stepDirection) {
                // Validate only on forward movement  
                if (stepDirection == 'forward') {
                    let form = document.getElementById('form-' + (currentStepIdx + 1));
                    if (form) {
                        if (!form.checkValidity()) {
                            form.classList.add('was-validated');
                            $('#smartwizard').smartWizard("setState", [currentStepIdx], 'error');
                            $("#smartwizard").smartWizard('fixHeight');
                            return false;
                        }
                        $('#smartwizard').smartWizard("unsetState", [currentStepIdx], 'error');
                    }
                }
            });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if (stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if (stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }

                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);


                @if ($evaluacion && $datos_otro)
                    $("#btnFinish").prop('disabled', false);
                @else
                    if (stepPosition == 'last') {
                        // showConfirm();
                        $("#btnFinish").prop('disabled', false);
                    } else {
                        $("#btnFinish").prop('disabled', true);
                    }
                @endif



                // Focus first name
                if (stepIndex == 1) {
                    setTimeout(() => {
                        $('#first-name').focus();
                    }, 0);
                }
            });

            // form 1
            let nueva_fila_f1 = `
                                <div class="row fila">
                                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                                    <input type="hidden" name="fb_ids[]" value="0"/>
                                    <button type="button" class="quitar">X</button>
                                    <div class="col-md-4">
                                        <label>Nivel Escolaridad</label>
                                        <select name="fb_nivels[]" class="form-select">
                                            <option value="">- Seleccione -</option>
                                            <option value="PRIMERO">PRIMARIA</option>
                                            <option value="SEGUNDO">SEGUNDO</option>
                                            <option value="TERCERO">TERCERO</option>
                                            <option value="CUARTO">CUARTO</option>
                                            <option value="QUINTO">QUINTO</option>
                                            <option value="SEXTO">SEXTO</option>
                                            <option value="SÉPTIMO">SÉPTIMO</option>
                                            <option value="OCTAVO">OCTAVO</option>
                                            <option value="PRIMERO MEDIO">PRIMERO MEDIO</option>
                                            <option value="SEGUNDO MEDIO">SEGUNDO MEDIO</option>
                                            <option value="TERCERO MEDIO">TERCERO MEDIO</option>
                                            <option value="CUARTO MEDIO">CUARTO MEDIO</option>
                                            <option value="PRIMERO DE SECUNDARIA">PRIMERO DE SECUNDARIA</option>
                                            <option value="SEGUNDO DE SECUNDARIA">SEGUNDO DE SECUNDARIA</option>
                                            <option value="TERCERO DE SECUNDARIA">TERCERO DE SECUNDARIA</option>
                                            <option value="CUARTO DE SECUNDARIA">CUARTO DE SECUNDARIA</option>
                                            <option value="QUINTO DE SECUNDARIA">QUINTO DE SECUNDARIA</option>
                                            <option value="SEXTO DE SECUNDARIA">SEXTO DE SECUNDARIA</option>
                                        </select>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Completa este campo
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Grado Escolaridad</label>
                                        <select name="fb_grados[]" class="form-select">
                                            <option value="">- Seleccione -</option>
                                            <option value="PRIMARIA">PRIMARIA</option>
                                            <option value="SECUNDARIA">SECUNDARIA</option>
                                            <option value="BACHILLER">BACHILLER</option>
                                        </select>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Completa este campo
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Institución</label>
                                        <input type="text" name="fb_institucions[]" class="form-control">
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Completa este campo
                                        </div>
                                    </div>
                                </div>`;

            form_1.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_1.find("input, select").prop("required", true);
                } else {
                    form_1.find("input, select").removeAttr("required");
                }
            });
            form_1.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f1).clone();
                form_1.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_1.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="fb_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_1);
                $("#smartwizard").smartWizard("fixHeight");
            })

            // form 2
            let nueva_fila_f2 = `
                            <div class="row fila">
                                <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                                    <input type="hidden" name="ec_ids[]" value="0"/>
                                    <button type="button" class="quitar">X</button>
                                <div class="col-md-4">
                                    <label>Título profesional*</label>
                                    <input type="text" name="ec_titulos[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Carrera*</label>
                                    <select name="ec_carreras[]" class="form-select">
                                        {!! $html_option_carreras !!}
                                    </select>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Institución*</label>
                                    <input type="text" name="ec_institucions[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Nivel profesional*</label>
                                    <select name="ec_nivels[]" class="form-select">
                                        <option value="">- Seleccione -</option>
                                        <option value="TÉCNICO MEDIO">TÉCNICO MEDIO</option>
                                        <option value="TÉCNICO SUPERIOR">TÉCNICO SUPERIOR
                                        </option>
                                        <option value="LICENCIATURA">LICENCIATURA</option>
                                    </select>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Fecha de título*</label>
                                    <input type="date" name="ec_fecha_titulos[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Estado*</label>
                                    <select name="ec_estados[]" class="form-select">
                                        <option value="">- Seleccione -</option>
                                        <option value="EN CURSO">EN CURSO</option>
                                        <option value="EGRESADO">EGRESADO</option>
                                        <option value="TITULADO">TITULADO</option>
                                    </select>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Número de título*</label>
                                    <select name="ec_disciplinas[]" class="form-select">
                                        <option value="">- Seleccione -</option>
                                        <option value="INGENIERIA">INGENIERIA</option>
                                        <option value="LICENCIATURA">LICENCIATURA</option>
                                    </select>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                            </div>`;

            form_2.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_2.find("input, select").prop("required", true);
                } else {
                    form_2.find("input, select").removeAttr("required");
                }
            });
            form_2.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f2).clone();
                form_2.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_2.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="ec_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_2);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }

            // form 3
            let nueva_fila_f3 = `
                            <div class="row fila">
                                <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                                <input type="hidden" name="fp_ids[]" value="0" />
                                <button type="button" class="quitar">X</button>
                                <div class="col-md-4">
                                    <label>Institución*</label>
                                    <input type="text" name="fp_institucions[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Fecha postgrado*</label>
                                    <select name="fp_fecha_postgrados[]" class="form-select">
                                        {!! $html_option_carreras !!}
                                    </select>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Título postgrado*</label>
                                    <input type="text" name="fp_titulos[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Nivel académico*</label>
                                    <input type="text" name="fp_nivels[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Postgrado*</label>
                                    <select name="fp_postgrados[]" class="form-select">
                                        <option value="">- Seleccione -</option>
                                        <option value="DOCTORADO">DOCTORADO</option>
                                        <option value="MAESTRÍA">MAESTRÍA</option>
                                        <option value="ESPECIALIDAD">ESPECIALIDAD</option>
                                        <option value="DIPLOMADO">DIPLOMADO</option>
                                    </select>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                            </div>`;

            form_3.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_3.find("input, select").prop("required", true);
                } else {
                    form_3.find("input, select").removeAttr("required");
                }
            });
            form_3.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f3).clone();
                form_3.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_3.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="fp_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_3);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }

            // form 4
            let nueva_fila_f4 = `
                    <div class="row fila">
                        <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                        <button type="button" class="quitar">X</button>
                        <input type="hidden" name="ecur_ids[]" value="0" />
                        <div class="col-md-4">
                            <label>Nombre Curso*</label>
                            <input type="text" name="ecur_nombres[]" class="form-control">
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                                Completa este campo
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Institución*</label>
                            <input type="text" name="ecur_institucions[]" class="form-control">
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                                Completa este campo
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Fecha*</label>
                            <input type="date" name="ecur_fechas[]" class="form-control">
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                                Completa este campo
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Carga Horaria(Horas)*</label>
                            <input type="number" step="1" name="ecur_carga_horarias[]" class="form-control">
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                                Completa este campo
                            </div>
                        </div>
                    </div>`;

            form_4.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_4.find("input, select").prop("required", true);
                } else {
                    form_4.find("input, select").removeAttr("required");
                }
            });
            form_4.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f4).clone();
                form_4.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_4.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="ecur_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_4);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }

            // form 5
            let nueva_fila_f5 = `
                            <div class="row fila">
                                <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                                <button type="button" class="quitar">X</button>
                                <input type="hidden" name="el_ids[]" value="0" />
                                <div class="col-md-4">
                                    <label>Cargo*</label>
                                    <input type="text" name="el_cargos[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Institución/Empresa*</label>
                                    <input type="text" name="el_institucions[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Fecha Inicio*</label>
                                    <input type="date" name="el_fecha_inis[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Fecha Final*</label>
                                    <input type="date" name="el_fecha_fins[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Descripción del cargo*</label>
                                    <input type="text" name="el_descripcions[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                            </div>`;

            form_5.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_5.find("input, select").prop("required", true);
                } else {
                    form_5.find("input, select").removeAttr("required");
                }
            });
            form_5.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f5).clone();
                form_5.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_5.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="el_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_5);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }

            // form 6
            let nueva_fila_f6 = `
                            <div class="row fila">
                                <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                                <button type="button" class="quitar">X</button>
                                <input type="hidden" name="ed_ids[]" value="0" />
                                <div class="col-md-4">
                                    <label>Mérito*</label>
                                    <input type="text" name="ed_meritos[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Institución*</label>
                                    <input type="text" name="ed_institucions[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Fecha*</label>
                                    <input type="date" name="ed_fechas[]" class="form-control">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                            </div>`;

            form_6.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_6.find("input, select").prop("required", true);
                } else {
                    form_6.find("input, select").removeAttr("required");
                }
            });
            form_6.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f6).clone();
                form_6.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_6.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="ed_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_6);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }

            // form 7
            let nueva_fila_f7 = `
                <div class="row fila">
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                    <button type="button" class="quitar">X</button>
                    <input type="hidden" name="id_ids[]" value="0" />
                    <div class="col-md-6">
                        <label>Idioma*</label>
                        <select name="id_idioma[]" class="form-select">
                            <option value="">- Seleccione -</option>
                            {!! $html_option_idiomas !!}
                        </select>
                        <div class="valid-feedback">
                        </div>
                        <div class="invalid-feedback">
                            Completa este campo
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Nivel*</label>
                        <select name="id_nivel[]" class="form-select">
                            <option value="">- Seleccione -</option>
                            <option value="BÁSICO">BÁSICO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="AVANZADO">AVANZADO</option>
                        </select>
                        <input type="text" name="id_nivel[]" class="form-control">
                        <div class="valid-feedback">
                        </div>
                        <div class="invalid-feedback">
                            Completa este campo
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Certificado*</label>
                        <select name="id_certificado[]" class="form-select">
                            <option value="">- Seleccione -</option>
                            <option value="CON CERTIFICADO">CON
                                CERTIFICADO</option>
                            <option value="SIN CERTIFICADO">SIN
                                CERTIFICADO</option>
                        </select>
                        <div class="valid-feedback">
                        </div>
                        <div class="invalid-feedback">
                            Completa este campo
                        </div>
                    </div>
                </div>`;

            form_7.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_7.find("input, select").prop("required", true);
                } else {
                    form_7.find("input, select").removeAttr("required");
                }
            });
            form_7.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f7).clone();
                form_7.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_7.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="id_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_7);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }

            // form 8
            let nueva_fila_f8 = `
                            <div class="row fila">
                                <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                                <button type="button" class="quitar">X</button>
                                <input type="hidden" name="hab_ids[]" value="0" />
                                <div class="col-md-12">
                                    <label>Habilidad/Conocimiento*</label>
                                    <textarea name="hab_habilidads[]" class="form-control"></textarea>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                            </div>`;

            form_8.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_8.find("input, select").prop("required", true);
                } else {
                    form_8.find("input, select").removeAttr("required");
                }
            });
            form_8.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f8).clone();
                form_8.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_8.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="hab_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_8);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }

            // form 9
            let nueva_fila_f9 = `
                <div class="row fila">
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                    <button type="button" class="quitar">X</button>
                    <input type="hidden" name="cua_ids[]" value="0" />
                    <div class="col-md-12">
                        <label>Cualidad*</label>
                        <textarea name="cua_cualidads[]" class="form-control"></textarea>
                        <div class="valid-feedback">
                        </div>
                        <div class="invalid-feedback">
                            Completa este campo
                        </div>
                    </div>
                </div>`;

            form_9.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_9.find("input, select").prop("required", true);
                } else {
                    form_9.find("input, select").removeAttr("required");
                }
            });
            form_9.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f9).clone();
                form_9.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_9.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="cua_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_9);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }

            // form 10
            let nueva_fila_f10 = `
                        <div class="row fila">
                            <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                            <button type="button" class="quitar">X</button>
                            <input type="hidden" name="ref_ids[]" value="0" />
                            <div class="col-md-4">
                                <label>Nombre referencia*</label>
                                <input type="text" name="ref_nombre_refs[]" class="form-control">
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Completa este campo
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Celular referencia*</label>
                                <input type="text" name="ref_cel_refs[]" class="form-control">
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Completa este campo
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Correo referencia*</label>
                                <input type="email" name="ref_correo_refs[]" class="form-control">
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Completa este campo
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Cargo referencia*</label>
                                <input type="text" name="ref_cargo_refs[]" class="form-control">
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Completa este campo
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Relación referencia*</label>
                                <input type="text" name="ref_relacion_refs[]" class="form-control">
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Completa este campo
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Descripción*</label>
                                <input type="text" name="ref_descripcions[]" class="form-control">
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Completa este campo
                                </div>
                            </div>
                        </div>`;

            form_10.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                // console.log(value)
                if (value != '') {
                    form_10.find("input, select").prop("required", true);
                } else {
                    form_10.find("input, select").removeAttr("required");
                }
            });
            form_10.on("click", ".btnAgregar", function() {
                let nuevo = $(nueva_fila_f10).clone();
                form_10.find(".fila").last().after(nuevo);
                $("#smartwizard").smartWizard("fixHeight");
            })
            form_10.on("click", ".quitar", function() {
                let fila = $(this).parents(".fila");
                if (fila.hasClass("existe")) {
                    let id = fila.attr("data-id");
                    $("#eliminados_forms").append(
                        `<input type="hidden" value="${id}" name="ref_eliminados[]">`);
                }
                fila.remove();
                quitarRequiredEliminar(form_10);
                $("#smartwizard").smartWizard("fixHeight");
            })

            function quitarRequiredEliminar(contenedor) {
                contenedor.find("input, select").removeAttr("required");
            }


        });

        function onConfirm() {
            let formdata1 = new FormData($("#form-1")[0]);
            let formdata2 = new FormData($("#form-2")[0]);
            let formdata3 = new FormData($("#form-3")[0]);
            let formdata4 = new FormData($("#form-4")[0]);
            let formdata5 = new FormData($("#form-5")[0]);
            let formdata6 = new FormData($("#form-6")[0]);
            let formdata7 = new FormData($("#form-7")[0]);
            let formdata8 = new FormData($("#form-8")[0]);
            let formdata9 = new FormData($("#form-9")[0]);
            let formdata10 = new FormData($("#form-10")[0]);
            let res = mergeFormData(formdata1, formdata2);
            res = mergeFormData(res, formdata3);
            res = mergeFormData(res, formdata4);
            res = mergeFormData(res, formdata5);
            res = mergeFormData(res, formdata6);
            res = mergeFormData(res, formdata7);
            res = mergeFormData(res, formdata8);
            res = mergeFormData(res, formdata9);
            res = mergeFormData(res, formdata10);
            $('#smartwizard').smartWizard("loader", "show");

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: "POST",
                url: "{{ route('evaluacions.store') }}",
                data: res,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response)

                    Swal.fire({
                        text: "Registro realizado correctamente",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Aceptar",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        },
                    })
                    $('#smartwizard').smartWizard("loader", "hide");
                    setTimeout(() => {
                        window.location.reload();
                    }, 700)
                },
                error: function(xhr, status, error) {
                    $('#smartwizard').smartWizard("loader", "hide");
                    if (xhr.status == 422) {
                        // Captura los errores de validación
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            console.log("Errores de validación:", xhr.responseJSON.errors);
                            let errorMessage = "";
                            for (const [key, messages] of Object.entries(xhr.responseJSON.errors)) {
                                // errorMessage += `${key}: ${messages.join(", ")}\n`;
                                errorMessage += `- ${messages.join(", ")}<br/>`;
                            }
                            // Muestra los errores usando SweetAlert
                            Swal.fire({
                                html: errorMessage,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Aceptar",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            });
                        }

                    } else {
                        Swal.fire({
                            text: "Algó salio mal. Intente nuevamente",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        })
                        console.log("Error:", status, error);
                    }

                }

            });
        }

        function mergeFormData(form1, form2) {
            let combinedFormData = new FormData();

            // Agregar datos del primer FormData
            form1.forEach((value, key) => combinedFormData.append(key, value));

            // Agregar datos del segundo FormData
            form2.forEach((value, key) => combinedFormData.append(key, value));

            return combinedFormData;
        }
    </script>
@endsection
