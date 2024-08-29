<script setup>
import { usePage } from "@inertiajs/vue3";
import { onMounted } from "vue";
const { props } = usePage();
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
const { oConfiguracion } = useConfiguracion();

var url_assets = "";
onMounted(() => {
    url_assets = props.url_assets;
});
</script>
<template>

</template>
