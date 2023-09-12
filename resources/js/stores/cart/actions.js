export default {
    obtenerProductos () {
        this.products = JSON.parse(localStorage.getItem("products")) || [];
    },
    agregarProducto (product, cantidad){
        
        //Buscar el index en el array
        const indexExist = this.products.findIndex( (el) => parseInt(el.id) === parseInt(product.id));

        //Si no existe el producto crear un registro
        if (indexExist === -1) {
            this.products.push({
                product: product,
                qty : cantidad,
            })
        }else{
            //Si existe actualizamos la cantida de ese item del carrito
            this.products[indexExist].qty += cantidad;
        }

        localStorage.setItem('products', JSON.stringify(this.products));
    },
    editarCantidad(idProducto, cantidad) {
        // Busco el índice del producto
        const indexExisteProducto = this.products.findIndex( (el) => parseInt(el.product.id) === parseInt(idProducto));

        console.log(indexExisteProducto);

        // Si el producto existe, edito la cantidad
        if(indexExisteProducto !== -1) {
            this.products[indexExisteProducto].qty = cantidad;
        }

        // Guardar products en local storage
        localStorage.setItem("products", JSON.stringify(this.products));
    },eliminarProducto(idProducto){
        // Busco el índice del producto
        const indexExisteProducto = this.products.findIndex( (el) => parseInt(el.product.id) === parseInt(idProducto));

        
        // Si el producto existe, edito la cantidad
        if(indexExisteProducto !== -1) {
            this.products.splice(indexExisteProducto, 1);
            localStorage.setItem("products", JSON.stringify(this.products));
        }


    }
};