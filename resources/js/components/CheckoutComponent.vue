<template>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-25">
                <h4>Datos de compra</h4>
            </div>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre completo" autocomplete="off"
				@change="storeCheckout.editarNombre($event.target.value)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Cédula" autocomplete="off"
				@change="storeCheckout.editarCc($event.target.value)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nro. Tarjeta de Credito" autocomplete="off"
				@change="storeCheckout.editarTc($event.target.value)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="CVC" autocomplete="off"
				@change="storeCheckout.editarCvc($event.target.value)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Fecha vencimiento (dd/mm/yyyy)" autocomplete="off"
				@change="storeCheckout.editarFecha($event.target.value)">
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="order_review">
                <div class="mb-20">
                    <h4>Tu pedido</h4>
                </div>
                <div class="table-responsive order_table text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Producto</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in storeCart.products" :key="product.id">
                                <td class="image product-thumbnail">
                                    <img v-bind:src="'../../../assets/imgs/shop/'+product.product.image+'-1.png'" alt="product image">

                                </td>
                                <td>
                                    <h5>{{ product.product.name }}</h5> <span class="product-qty">x {{ product.qty }}</span>
                                </td>
                                <td>${{ product.product.regular_price * product.qty }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">${{ total }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                <a href="#" @click="finalizarCompra" class="btn btn-fill-out btn-block mt-30">Finalizar Compra</a>
            </div>
        </div>
    </div>
</div>
    
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useCartStore } from '../stores/cart/index';
import { useCheckoutStore } from "@/stores/checkout/index.js";

//porpiedades vue
const props = defineProps({
  user :{
    type : Object,
  }
});

//stores
const storeCart = useCartStore();
const storeCheckout = useCheckoutStore();

const total = ref(0);

const finalizarCompra = () => {
axios
    .post('/api/cart', {
        productos: storeCart.products,
        user: props.user,
        name: storeCheckout.name,
        tc: storeCheckout.tc,
        cc: storeCheckout.cc,
        cvc: storeCheckout.cvc,
        fecha_vencimiento: storeCheckout.fecha_vencimiento
    })
    .then( (responseFinalizarCompra) => {
        console.log("se finalizó la compra");
    }).catch( (err) => {
        console.error(err);
    });
};

// Eventos
onMounted( () => {

    storeCart.obtenerProductos();

    for (let index = 0; index < storeCart.products.length; index++) {
        const element = storeCart.products[index];
        total.value += parseFloat(element.product.regular_price * element.qty);
    }

});



</script>