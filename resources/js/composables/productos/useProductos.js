import axios from "axios";
import { onMounted, reactive } from "vue";
import { usePage } from "@inertiajs/vue3";

const oProducto = reactive({
    id: 0,
    user_id: "",
    descripcion: "",
    categoria_id: "",
    producto_tamano_id: "",
    precio: "",
    precio_total: "",
    color: "",
    modelo: "",
    marca: "",
    otros: "",
    foto_productos: reactive([]),
    eliminados: reactive([]),
    _method: "POST",
});

export const useProductos = () => {
    const { flash } = usePage().props;
    const getProductos = async () => {
        try {
            const response = await axios.get(route("productos.listado"), {
                headers: { Accept: "application/json" },
            });
            return response.data.productos;
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

    const getProductosApi = async (data) => {
        try {
            const response = await axios.get(
                route("productos.paginado", data),
                {
                    headers: { Accept: "application/json" },
                }
            );
            return response.data.productos;
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
    const saveProducto = async (data) => {
        try {
            const response = await axios.post(route("productos.store", data), {
                headers: { Accept: "application/json" },
            });
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

    const deleteProducto = async (id) => {
        try {
            const response = await axios.delete(
                route("productos.destroy", id),
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

    const setProducto = (item = null, archivos = false) => {
        if (item) {
            oProducto.id = item.id;
            oProducto.user_id = item.user_id;
            oProducto.descripcion = item.descripcion;
            oProducto.categoria_id = item.categoria_id;
            oProducto.producto_tamano_id = item.producto_tamano_id;
            oProducto.precio = item.precio;
            oProducto.precio_total = item.precio_total;
            oProducto.color = item.color;
            oProducto.modelo = item.modelo;
            oProducto.marca = item.marca;
            oProducto.otros = item.otros;
            oProducto.foto_productos = reactive([]);
            oProducto.eliminados = reactive([]);
            if (archivos) {
                oProducto.foto_productos = reactive([...item.foto_productos]);
            }
            oProducto._method = "PUT";
            return oProducto;
        }
        return false;
    };

    const limpiarProducto = () => {
        oProducto.id = 0;
        oProducto.user_id = "";
        oProducto.descripcion = "";
        oProducto.categoria_id = "";
        oProducto.producto_tamano_id = "";
        oProducto.precio = "";
        oProducto.precio_total = "";
        oProducto.color = "";
        oProducto.modelo = "";
        oProducto.marca = "";
        oProducto.otros = "";
        oProducto.foto_productos = reactive([]);
        oProducto.eliminados = reactive([]);
        oProducto._method = "POST";
    };

    onMounted(() => {});

    return {
        oProducto,
        getProductos,
        getProductosApi,
        saveProducto,
        deleteProducto,
        setProducto,
        limpiarProducto,
    };
};
