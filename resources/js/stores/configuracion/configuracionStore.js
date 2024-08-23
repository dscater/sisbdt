import { defineStore } from "pinia";

export const useConfiguracionStore = defineStore("configuracion", {
    state: () => ({
        oConfiguracion: {
            nombre_sistema: "SISOBRAS",
            alias: "SO",
            // appends
            iniciales_nombre: "",
            url_logo: "",
        },
    }),
    actions: {
        setConfiguracion(value) {
            this.oConfiguracion = value;
        },
    },
});
