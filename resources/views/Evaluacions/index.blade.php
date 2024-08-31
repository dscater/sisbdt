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
    </style>
@endsection
@section('content')
    <h3 class="text-center text-h4">EVALUACIÓN</h3>
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
                </ul>

                <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                        <form id="form-1">
                            <div class="row fila">
                                <div class="col-md-4">
                                    <label>Nivel Escolaridad</label>
                                    <input type="text" class="form-control">
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Grado Escolaridad</label>
                                    <input type="text" class="form-control">
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Institución</label>
                                    <input type="text" class="form-control">
                                    <div class="valid-feedback">

                                    </div>
                                    <div class="invalid-feedback">
                                        Completa este campo
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-success mx-auto btn-sm"><i class="fa fa-plus"></i>
                                        Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                        Step content
                    </div>
                    <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                        Step content
                    </div>
                    <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                        Step content
                    </div>
                    <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                        Step content
                    </div>
                    <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-6">
                        Step content
                    </div>
                </div>

                <!-- Include optional progressbar HTML -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
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
                extraHtml: `<button class="btn btn-success" id="btnFinish" disabled onclick="onConfirm()">Finalizar evaluación</button>`
            },
            disabledSteps: [],
        });

        $(document).ready(function() {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");

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
                    extraHtml: `<button class="btn btn-success" id="btnFinish" disabled onclick="onConfirm()">Finalizar evaluación</button>`
                },
                anchor: {
                    anchorClickable: true, // Enable/Disable anchor navigation
                    enableAllAnchors: true, // Activates all anchors clickable all times
                    markDoneStep: true, // Add done state on navigation
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                }
            });

            form_1.on('change keyup', 'input, select', function() {
                let value = $(this).val().trim()
                console.log(value)
                if (value != '') {
                    form_1.find("input, select").prop("required", true);
                } else {
                    form_1.find("input, select").removeAttr("required");
                    form_1.reset();
                }
            })

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

                if (stepPosition == 'last') {
                    // showConfirm();
                    $("#btnFinish").prop('disabled', false);
                } else {
                    $("#btnFinish").prop('disabled', true);
                }

                // Focus first name
                if (stepIndex == 1) {
                    setTimeout(() => {
                        $('#first-name').focus();
                    }, 0);
                }
            });

        });
    </script>
@endsection
