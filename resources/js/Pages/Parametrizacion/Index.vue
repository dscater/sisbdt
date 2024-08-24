<script setup>
import App from "@/Layouts/App.vue";
defineOptions({
    layout: App,
});

import { onMounted } from "vue";
// componentes
import { usePage, Head, useForm } from "@inertiajs/vue3";

/* Definimos los datos que recibimos desde el controlador
    en este caso un unico parametro "parametrizacion".
    Esto sucede en:
    return Inertia::render("Parametrizacion/Index", compact("parametrizacion"));
*/
const props_page = defineProps({
    parametrizacion: {
        type: Object,
        default: null,
    },
});
const { props } = usePage();

// Preparamos el formulario para mostrar y enviar los datos
let form = null;
if (props_page.parametrizacion != null) {
    // si el valor de parametrizacion existe definimos nuestro formulario con esa informacion
    form = useForm(props_page.parametrizacion);
} else {
    // caso contrario inicializamos el formulario con valores por defecto
    form = useForm({
        primaria: 0,
        secundaria: 0,
        bachiller: 0,
        titulado: 0,
        egresado: 0,
        en_curso: 0,
        tecnico_superior: 0,
        tecnico_medio: 0,
        disciplina_ingenieria: 0,
        doctorado: 0,
        maestria: 0,
        especialidad: 0,
        diplomado: 0,
        c_carga_horaria: 0,
        p_cada_mes: 0,
        p_cada_reconocimiento: 0,
    });
}

// funcion para enviar los datos del formulario a la ruta definida en nuestro archivo "routes/web.php"
const enviarFormulario = () => {
    form.post(route("parametrizacions.store"), {
        onSuccess: () => {
            // Mostrar mensaje de éxito
            console.log("correcto");
            Swal.fire({
                icon: "success",
                title: "Correcto",
                html: `<strong>Proceso realizado con éxito</strong>`,
                showCancelButton: false,
                confirmButtonColor: "#056ee9",
                confirmButtonText: "Aceptar",
            });
        },
        onError: (err, code) => {
            console.log(code);
            console.log(err.response);
            console.log("error");
        },
    });
};

onMounted(() => {});
</script>
<template>
    <Head title="Parametrización"></Head>
    <h3 class="text-center text-h4">PARAMETRIZACION</h3>
    <div class="row">
        <form @submit.prevent="enviarFormulario()">
            <div class="col-12">
                <div class="row">
                    <h5>Formación básica</h5>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Primaria</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.primaria"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.primaria"
                            >{{ form.errors.primaria }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Secundaria</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.secundaria"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.secundaria"
                            >{{ form.errors.secundaria }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Bachiller</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.bachiller"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.bachiller"
                            >{{ form.errors.bachiller }}</span
                        >
                    </div>
                </div>
                <div class="row mt-0">
                    <div class="separator separator-content my-14"></div>
                    <h5>Formación Carrera</h5>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Títulado</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.titulado"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.titulado"
                            >{{ form.errors.titulado }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Egresado</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.egresado"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.egresado"
                            >{{ form.errors.egresado }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">En curso</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.en_curso"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.en_curso"
                            >{{ form.errors.en_curso }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Técnico Superior</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.tecnico_superior"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.tecnico_superior"
                            >{{ form.errors.tecnico_superior }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Técnico medio</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.tecnico_medio"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.tecnico_medio"
                            >{{ form.errors.tecnico_medio }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Disciplina Ingeniería</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.disciplina_ingenieria"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.disciplina_ingenieria"
                            >{{ form.errors.disciplina_ingenieria }}</span
                        >
                    </div>
                </div>
                <div class="row mt-0">
                    <div class="separator separator-content my-14"></div>
                    <h5>Formación Postgrado</h5>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Doctorado</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.doctorado"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.doctorado"
                            >{{ form.errors.doctorado }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Maestría</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.maestria"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.maestria"
                            >{{ form.errors.maestria }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Especialidad</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.especialidad"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.especialidad"
                            >{{ form.errors.especialidad }}</span
                        >
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Diplomado</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.diplomado"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.diplomado"
                            >{{ form.errors.diplomado }}</span
                        >
                    </div>
                </div>
                <div class="row mt-0">
                    <div class="separator separator-content my-14"></div>
                    <h5>Cursos</h5>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Por carga horaria</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.c_carga_horaria"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.c_carga_horaria"
                            >{{ form.errors.c_carga_horaria }}</span
                        >
                    </div>
                </div>
                <div class="row mt-0">
                    <div class="separator separator-content my-14"></div>
                    <h5>Experiencia Laboral</h5>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Por cada mes</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.p_cada_mes"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.p_cada_mes"
                            >{{ form.errors.p_cada_mes }}</span
                        >
                    </div>
                </div>
                <div class="row mt-0">
                    <div class="separator separator-content my-14"></div>
                    <h5>Distinciones</h5>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Por cada reconocimiento</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.p_cada_reconocimiento"
                        />
                        <span
                            class="text-danger"
                            v-if="form.errors?.p_cada_reconocimiento"
                            >{{ form.errors.p_cada_reconocimiento }}</span
                        >
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
</template>
<style></style>
