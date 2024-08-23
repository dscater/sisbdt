import axios from "axios";
import { onMounted, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const oConfiguracionPago = ref({
    id: 0,
    banco: "",
    nro_cuenta: "",
    qr: "",
    _method: "POST",
});

export const useConfiguracionPagos = () => {
    const { flash } = usePage().props;

    const getConfiguracionPagosPortal = async () => {
        try {
            const response = await axios.get(
                route("configuracion_pagos.portal"),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.configuracion_pagos;
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: `${
                    flash.error
                        ? flash.error
                        : err.response?.data
                        ? err.response?.data?.message
                        : "Hay errores en el formulario"
                }`,
                confirmButtonColor: "#3085d6",
                confirmButtonText: `Aceptar`,
            });
            throw err; // Puedes manejar el error según tus necesidades
        }
    };
    const getConfiguracionPagos = async () => {
        try {
            const response = await axios.get(
                route("configuracion_pagos.listado"),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.configuracion_pagos;
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: `${
                    flash.error
                        ? flash.error
                        : err.response?.data
                        ? err.response?.data?.message
                        : "Hay errores en el formulario"
                }`,
                confirmButtonColor: "#3085d6",
                confirmButtonText: `Aceptar`,
            });
            throw err; // Puedes manejar el error según tus necesidades
        }
    };

    const getConfiguracionPagosApi = async (data) => {
        try {
            const response = await axios.get(
                route("configuracion_pagos.paginado", data),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.configuracion_pagos;
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: `${
                    flash.error
                        ? flash.error
                        : err.response?.data
                        ? err.response?.data?.message
                        : "Hay errores en el formulario"
                }`,
                confirmButtonColor: "#3085d6",
                confirmButtonText: `Aceptar`,
            });
            throw err; // Puedes manejar el error según tus necesidades
        }
    };
    const saveConfiguracionPago = async (data) => {
        try {
            const response = await axios.post(
                route("configuracion_pagos.store", data),
                {
                    headers: { Accept: "application/json" },
                }
            );
            Swal.fire({
                icon: "success",
                title: "Correcto",
                text: `${flash.bien ? flash.bien : "Proceso realizado"}`,
                confirmButtonColor: "#3085d6",
                confirmButtonText: `Aceptar`,
            });
            return response.data;
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: `${
                    flash.error
                        ? flash.error
                        : err.response?.data
                        ? err.response?.data?.message
                        : "Hay errores en el formulario"
                }`,
                confirmButtonColor: "#3085d6",
                confirmButtonText: `Aceptar`,
            });
            console.error("Error:", err);
            throw err; // Puedes manejar el error según tus necesidades
        }
    };

    const deleteConfiguracionPago = async (id) => {
        try {
            const response = await axios.delete(
                route("configuracion_pagos.destroy", id),
                {
                    headers: { Accept: "application/json" },
                }
            );
            Swal.fire({
                icon: "success",
                title: "Correcto",
                text: `${flash.bien ? flash.bien : "Proceso realizado"}`,
                confirmButtonColor: "#3085d6",
                confirmButtonText: `Aceptar`,
            });
            return response.data;
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: `${
                    flash.error
                        ? flash.error
                        : err.response?.data
                        ? err.response?.data?.message
                        : "Hay errores en el formulario"
                }`,
                confirmButtonColor: "#3085d6",
                confirmButtonText: `Aceptar`,
            });
            throw err; // Puedes manejar el error según tus necesidades
        }
    };

    const setConfiguracionPago = (item = null) => {
        if (item) {
            oConfiguracionPago.value.id = item.id;
            oConfiguracionPago.value.banco = item.banco;
            oConfiguracionPago.value.nro_cuenta = item.nro_cuenta;
            oConfiguracionPago.value.qr = item.qr;
            oConfiguracionPago.value._method = "PUT";
            return oConfiguracionPago;
        }
        return false;
    };

    const limpiarConfiguracionPago = () => {
        oConfiguracionPago.value.id = 0;
        oConfiguracionPago.value.banco = "";
        oConfiguracionPago.value.nro_cuenta = "";
        oConfiguracionPago.value.qr = "";
        oConfiguracionPago.value._method = "POST";
    };

    onMounted(() => {});

    return {
        oConfiguracionPago,
        getConfiguracionPagosPortal,
        getConfiguracionPagos,
        getConfiguracionPagosApi,
        saveConfiguracionPago,
        deleteConfiguracionPago,
        setConfiguracionPago,
        limpiarConfiguracionPago,
    };
};
