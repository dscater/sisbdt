import { defineStore } from "pinia";

export const useCarritoStore = defineStore("carrito", {
    state: () => ({
        productos: [],
        total_final: 0,
    }),
    actions: {
        inicializaCarrito() {
            if (localStorage.getItem("productos")) {
                this.productos = JSON.parse(localStorage.getItem("productos"));
                this.calculaTotalFinal();
            }
        },
        addProducto(item) {
            this.productos.push(item);
            this.updateLocalStorage();
            this.calculaTotalFinal();
        },
        deleteProducto(index) {
            this.productos.splice(index, 1);
            this.updateLocalStorage();
            this.calculaTotalFinal();
        },
        actualizaCantidadProducto(index, cantidad) {
            this.productos[index].cantidad = cantidad;
            this.productos[index].precio_total =
                parseFloat(this.productos[index].cantidad) *
                parseFloat(this.productos[index].producto.precio_total);
            this.productos[index].precio_total = parseFloat(
                this.productos[index].precio_total
            ).toFixed(2);
            this.calculaTotalFinal();
            this.updateLocalStorage();
        },
        updateLocalStorage() {
            localStorage.setItem("productos", JSON.stringify(this.productos));
        },
        calculaTotalFinal() {
            let total = 0;
            this.productos.forEach((elem) => {
                total = total + parseFloat(elem.precio_total);
            });
            this.total_final = parseFloat(total).toFixed(2);
        },
        vaciaCarrito() {
            this.productos = [];
            this.total_final = 0;
            localStorage.removeItem("productos");
        },
    },
});
