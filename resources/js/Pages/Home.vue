<script setup>
import App from "@/Layouts/App.vue";
defineOptions({
    layout: App,
});
import { onMounted } from "vue";
import { useApp } from "@/composables/useApp";
// componentes
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
import { usePage, Head } from "@inertiajs/vue3";
const props_page = defineProps({
    array_infos: {
        type: Array,
    },
});

const { setLoading } = useApp();
onMounted(() => {
    setTimeout(() => {
        setLoading(false);
    }, 300);
});
const { oConfiguracion } = useConfiguracion();

const { props } = usePage();
</script>
<template>
    <Head title="Inicio"></Head>

    <h4 class="text-center text-h4">
        Bienvenid@ {{ props.auth.user.full_name }}
    </h4>
    <div
        class="row"
        v-if="props.auth.user && props.auth.user.tipo == 'POSTULANTE'"
    >
        <div class="col-md-3 mx-auto item_btn">
            <a class="contenido_item">
                Datos Personales <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="col-md-3 mx-auto item_btn">
            <a class="contenido_item">
                Evaluación <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="col-md-3 mx-auto item_btn">
            <a class="contenido_item">
                Otros datos <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</template>
<style scoped>
</style>
