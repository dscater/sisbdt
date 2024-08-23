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
.item_btn {
    margin: 10px;
}

.contenido_item i {
    color: black;
}

.contenido_item {
    transition: all 0.8s;
    color: black;
    padding: 10px;
    cursor: pointer;
    background-color: rgb(248, 229, 229);
    border: solid 2px rgb(243, 211, 211);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    font-size: 1.3em;
    flex-direction: column;
}
</style>
