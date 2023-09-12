export default {
    obtenerProductos () {
        this.products = JSON.parse(localStorage.getItem("products")) || [];
    },
    agregarProducto (product, cantidad, idUser){
        
        //Buscar el index en el array
        const indexExist = this.products.findIndex( (el) => parseInt(el.id) === parseInt(product.id));

        //Si no existe el producto crear un registro
        if (indexExist === -1) {
            this.products.push({
                product: product,
                qty : cantidad,
            });
            
            axios.post('api/products', {
                user_id: idUser,
                product_id: product.id,
                quantity: cantidad,
                subtotal: cantidad * product.regular_price,
            })
            .then(function (response) {
                console.log('orden de compra abierta');
            })
            .catch(function (error) {
                console.log(error);
            });
            
        }else{
            //Si existe actualizamos la cantida de ese item del carrito
            this.products[indexExist].qty += cantidad;

            axios.patch('api/products', {
                user_id: idUser,
                product_id: product.id,
                quantity: cantidad,
                subtotal: cantidad * product.regular_price,
            })
            .then(function (response) {
                console.log('orden de compra editada');
            })
            .catch(function (error) {
                console.log(error);
            });
        }


        localStorage.setItem('products', JSON.stringify(this.products));
    },
    editarCantidad(idProducto, cantidad, idUser) {
        // Busco el índice del producto
        const indexExisteProducto = this.products.findIndex( (el) => parseInt(el.product.id) === parseInt(idProducto));

        // Si el producto existe, edito la cantidad
        if(indexExisteProducto !== -1) {
            this.products[indexExisteProducto].qty = cantidad;

            axios.patch('api/products/'+idProducto, {
                user_id: idUser,
                product_id: idProducto,
                quantity: cantidad,
                subtotal: cantidad * this.products[indexExisteProducto].product.regular_price,
            })
            .then(function (response) {
                console.log('orden de compra editada');
            })
            .catch(function (error) {
                console.log(error);
            });
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