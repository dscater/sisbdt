<script setup>
import App from "@/Layouts/App.vue";
defineOptions({
    layout: App,
});

import { onMounted, ref } from "vue";
// componentes
import { usePage, Head, useForm } from "@inertiajs/vue3";
const props_page = defineProps({
    configuracion: {
        type: Object,
        default: null,
    },
});
const { props } = usePage();

let form = null;
if (props_page.configuracion != null) {
    props_page.configuracion["_method"] = "put";
    form = useForm(props_page.configuracion);
} else {
    form = useForm({
        _method: "put",
        id: 0,
        nombre_sistema: "",
        alias: "",
        url_logo: "",
        logo: "",
    });
}

const enviarFormulario = () => {
    form.post(route("configuracions.update", form.id), {
        onSuccess: () => {
            // Mostrar mensaje de éxito
            console.log("correcto");
            limpiaRefs();
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
const logo = ref(null);
function cargaArchivo(e, key) {
    form[key] = null;
    form[key] = e.target.files[0];

    // Generar la URL del archivo cargado
    const fileUrl = URL.createObjectURL(form[key]);
    form["url_" + key] = fileUrl;
}
function limpiaRefs() {
    logo.value = null;
}
onMounted(() => {});
</script>
<template>
    <Head title="Parametrización"></Head>
</template>
<style scoped>
.logo_muestra {
    margin-top: 10px;
    width: 100%;
    text-align: center;
}
.logo_muestra img {
    max-width: 100%;
}
</style>
