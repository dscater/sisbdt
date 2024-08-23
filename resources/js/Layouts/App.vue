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
    <div class="app-default">
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div
                class="app-page flex-column flex-column-fluid"
                id="kt_app_page"
            >
                <NavBar></NavBar>
                <!--begin::Wrapper-->
                <div
                    class="app-wrapper flex-column flex-row-fluid"
                    id="kt_app_wrapper"
                >
                    <!--begin::Wrapper container-->
                    <div class="app-container container-xxl">
                        <!--begin::Main-->
                        <div
                            class="app-main flex-column flex-row-fluid"
                            id="kt_app_main"
                        >
                            <!--begin::Content wrapper-->
                            <div class="d-flex flex-column flex-column-fluid">
                                <!--begin::Content-->
                                <div id="kt_app_content" class="app-content">
                                    <slot></slot>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Content wrapper-->
                            <Footer></Footer>
                        </div>
                        <!--end:::Main-->
                    </div>
                    <!--end::Wrapper container-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
    </div>
</template>
