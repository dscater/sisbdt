<script setup>
// includes
import { usePage, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import Footer from "./includes/Footer.vue";
import NavBar from "./includes/NavBar.vue";
import SideBar from "./includes/SideBar.vue";
import { useApp } from "@/composables/useApp";
import { onMounted } from "vue";

const { props } = usePage();
var url_assets = "";
var url_principal = "";
const { loading, setLoading } = useApp();
setLoading(true);

onMounted(() => {
    setTimeout(() => {
        setLoading(false);
    }, 300);

    url_assets = props.url_assets;
    url_principal = props.url_principal;
});
</script>
<template>
</template>
