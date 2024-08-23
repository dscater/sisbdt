<script>
import Portal from "@/Layouts/Portal.vue";
import { onMounted } from "vue";
export default {
    layout: Portal,
};
</script>

<script setup>
import { onMounted, ref, watch } from "vue";
import { Head, usePage } from "@inertiajs/vue3";
var url_assets = "";
const { props } = usePage();

onMounted(() => {
    url_assets = props.url_assets;
});
</script>
<template>
    <Head title="Inicio"></Head>

</template>

<style scoped></style>
