import axios from "axios";
import { onMounted, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const oProductoTamano = ref({
    id: 0,
    nombre: "",
    descripcion: "",
    p_comision: 0,
    _method: "POST",
});

export const useProductoTamanos = () => {
    const { flash } = usePage().props;
    const getProductoTamanos = async () => {
        try {
            const response = await axios.get(
                route("producto_tamanos.listado"),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.producto_tamanos;
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

    const getProductoTamanosApi = async (data) => {
        try {
            const response = await axios.get(
                route("producto_tamanos.paginado", data),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.producto_tamanos;
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
    const saveProductoTamano = async (data) => {
        try {
            const response = await axios.post(
                route("producto_tamanos.store", data),
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

    const deleteProductoTamano = async (id) => {
        try {
            const response = await axios.delete(
                route("producto_tamanos.destroy", id),
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

    const setProductoTamano = (item = null) => {
        if (item) {
            oProductoTamano.value.id = item.id;
            oProductoTamano.value.nombre = item.nombre;
            oProductoTamano.value.descripcion = item.descripcion;
            oProductoTamano.value.p_comision = item.p_comision;
            oProductoTamano.value._method = "PUT";
            return oProductoTamano;
        }
        return false;
    };

    const limpiarProductoTamano = () => {
        oProductoTamano.value.id = 0;
        oProductoTamano.value.nombre = "";
        oProductoTamano.value.descripcion = "";
        oProductoTamano.value.p_comision = 0;
        oProductoTamano.value._method = "POST";
    };

    onMounted(() => {});

    return {
        oProductoTamano,
        getProductoTamanos,
        getProductoTamanosApi,
        saveProductoTamano,
        deleteProductoTamano,
        setProductoTamano,
        limpiarProductoTamano,
    };
};
