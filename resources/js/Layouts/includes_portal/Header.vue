<script setup>
import { usePage, Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
import { useMenuPortalStore } from "@/stores/menuPortalStore";
const menu_portal_store = useMenuPortalStore();
const { oConfiguracion } = useConfiguracion();
const { props } = usePage();
const user = props.auth.user;
var url_assets = "";
var url_principal = "";

const listMenu = ref([
    {
        label: "INICIO",
        url: "/",
        ruta: "",
    },
]);

const cambiarRuta = (ruta) => {
    menu_portal_store.setLoadingPage(true);
    menu_portal_store.setRutaActual(ruta);
};

function toggleMenu() {
    $(".menu_page_movil").toggleClass("show");
}

onMounted(() => {
    url_assets = props.url_assets;
    url_principal = props.url_principal;
});
</script>
<template>

</template>
<style></style>
