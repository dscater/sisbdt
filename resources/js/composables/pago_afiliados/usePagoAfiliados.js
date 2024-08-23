import axios from "axios";
import { onMounted, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const oPagoAfiliado = ref({
    id: 0,
    orden_venta_id: null,
    descripcion: "",
    estado: "",
    _method: "POST",
});

export const usePagoAfiliados = () => {
    const { flash } = usePage().props;

    const getPagoAfiliados = async () => {
        try {
            const response = await axios.get(route("pago_afiliados.listado"), {
                headers: { Accept: "application/json" },
            });
            return response.data.pago_afiliados;
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

    const getPagoAfiliadosApi = async (data) => {
        try {
            const response = await axios.get(
                route("pago_afiliados.paginado", data),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.pago_afiliados;
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
    const savePagoAfiliado = async (data) => {
        try {
            const response = await axios.post(
                route("pago_afiliados.store", data),
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

    const deletePagoAfiliado = async (id) => {
        try {
            const response = await axios.delete(
                route("pago_afiliados.destroy", id),
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

    const setPagoAfiliado = (item = null) => {
        if (item) {
            oPagoAfiliado.value.id = item.id;
            oPagoAfiliado.value.orden_venta_id = item.orden_venta_id;
            oPagoAfiliado.value.descripcion = item.descripcion;
            oPagoAfiliado.value.estado = item.estado;
            oPagoAfiliado.value._method = "PUT";
            return oPagoAfiliado;
        }
        return false;
    };

    const limpiarPagoAfiliado = () => {
        oPagoAfiliado.value.id = 0;
        oPagoAfiliado.value.orden_venta_id = null;
        oPagoAfiliado.value.descripcion = "";
        oPagoAfiliado.value.estado = "";
        oPagoAfiliado.value._method = "POST";
    };

    onMounted(() => {});

    return {
        oPagoAfiliado,
        getPagoAfiliados,
        getPagoAfiliadosApi,
        savePagoAfiliado,
        deletePagoAfiliado,
        setPagoAfiliado,
        limpiarPagoAfiliado,
    };
};
