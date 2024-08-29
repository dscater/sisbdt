<script setup>
// Composables
import { usePage, Link, router } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
import { useMenu } from "@/composables/useMenu";
import { useUser } from "@/composables/useUser";
const { props } = usePage();
const { oUser } = useUser();
var url_assets = "";
var url_principal = "";
const { drawer, width, rail, mobile, toggleDrawer, cambiarUrl } = useMenu();

const user = {
    initials: "JD",
    fullName: "John Doe",
    email: "john.doe@doe.com",
};

const { oConfiguracion } = useConfiguracion();

const logout = () => {
    router.post(route("logout"));
};

onMounted(() => {
    url_assets = props.url_assets;
    url_principal = props.url_principal;
    console.log(oUser);
});
</script>
<template>

</template>
