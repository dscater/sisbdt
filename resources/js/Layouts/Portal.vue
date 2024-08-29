<script setup>
// includes
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import { onMounted } from "vue";
import Header from "./includes_portal/Header.vue";
import Footer from "./includes_portal/Footer.vue";
import { useMenuPortalStore } from "@/stores/menuPortalStore";
const menu_portal_store = useMenuPortalStore();
// menu_portal_store.setLoadingPage(true);

var url_assets = "";

const { props } = usePage();

onMounted(() => {
    url_assets = props.url_assets;
});
</script>
<template>

</template>
