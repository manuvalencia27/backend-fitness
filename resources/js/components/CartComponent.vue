<template>
    <div>
        <a class="mini-cart-icon" href="#">
            <img alt="Sport Fitness"
                v-bind:src="'../../assets/imgs/theme/icons/icon-cart.svg'">
                <span class="pro-count blue">{{ cantidadProductos  }}</span>
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <div v-if="products.length > 0">
                <ul v-for="product in products" :key="product.id">
                    <li>
                        <div class="shopping-cart-img">
                            <img v-bind:src="'../../../assets/imgs/shop/'+product.product.image+'-1.png'" alt="product image">
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="product-details.html">{{ product.product.SKU }}</a></h4>
                            <h4><span>{{ product.qty }} × </span>${{ product.product.regular_price  }}</h4>
                        </div>
                    </li>
                </ul>
            </div>
            <div v-else>
                <h4> No hay productos agregados al carrito </h4>
            </div>
            <div class="shopping-cart-footer" v-if="products.length > 0">
                <div class="shopping-cart-total">
                    <h4>Total <span>${{ total }}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a :href="'/cart'" class="outline">View cart</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";

import { useCartStore } from '../stores/cart/index';

// Data
const products = ref([]);
const cantidadProductos = ref(0);
const total = ref(0);

//Store
const store = useCartStore();

// Métodos
const setData = () => {
	products.value = store.products;
    
    for (let index = 0; index < products.value.length; index++) {
        const element = products.value[index];
        cantidadProductos.value += parseInt(element.qty);
        total.value += parseFloat(element.product.regular_price * element.qty);
    }
}

onMounted ( () => {
    store.obtenerProductos();
    setData();
});
</script>

<style scoped>

a img {
    width: 100%;
    max-width: 25px;
    opacity: 0.8;
}

.pro-count.blue{
    background-color: #F15412;
}

.pro-count{
    position: absolute;
    right: -11px;
    top: -5px;
    color: #ffffff;
    height: 18px;
    width: 18px;
    border-radius: 100%;
    font-weight: 500;
    font-size: 11px;
    text-align: center;
    line-height: 18px;    
}




</style>
