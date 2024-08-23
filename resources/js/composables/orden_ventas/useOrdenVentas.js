import axios from "axios";
import { onMounted, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const oOrdenVenta = ref({
    id: 0,
    nombre: "",
    descripcion: "",
    p_comision: 0,
    _method: "POST",
});

export const useOrdenVentas = () => {
    const { flash } = usePage().props;

    const getOrdenVentas = async (data) => {
        try {
            const response = await axios.get(route("orden_ventas.listado"), {
                params: data,
                headers: { Accept: "application/json" },
            });
            return response.data.orden_ventas;
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

    const getOrdenVentasApi = async (data) => {
        try {
            const response = await axios.get(
                route("orden_ventas.paginado", data),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.orden_ventas;
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

    const getOrdenVentasPaginadoApi = async (data) => {
        try {
            const response = await axios.get(
                route("orden_ventas.ventas_paginado", data),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.orden_ventas;
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

    const saveOrdenVenta = async (data) => {
        try {
            const response = await axios.post(
                route("orden_ventas.store", data),
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

    const deleteOrdenVenta = async (id) => {
        try {
            const response = await axios.delete(
                route("orden_ventas.destroy", id),
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

    const setOrdenVenta = (item = null) => {
        if (item) {
            oOrdenVenta.value.id = item.id;
            oOrdenVenta.value.nombre = item.nombre;
            oOrdenVenta.value.descripcion = item.descripcion;
            oOrdenVenta.value.p_comision = item.p_comision;
            oOrdenVenta.value._method = "PUT";
            return oOrdenVenta;
        }
        return false;
    };

    const limpiarOrdenVenta = () => {
        oOrdenVenta.value.id = 0;
        oOrdenVenta.value.nombre = "";
        oOrdenVenta.value.descripcion = "";
        oOrdenVenta.value.p_comision = 0;
        oOrdenVenta.value._method = "POST";
    };

    onMounted(() => {});

    return {
        oOrdenVenta,
        getOrdenVentas,
        getOrdenVentasApi,
        getOrdenVentasPaginadoApi,
        saveOrdenVenta,
        deleteOrdenVenta,
        setOrdenVenta,
        limpiarOrdenVenta,
    };
};
