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
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
		<Header></Header>
		<slot></slot>
		<!-- <Footer></Footer> -->
    </div>
    <!--end::Root-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
</template>
