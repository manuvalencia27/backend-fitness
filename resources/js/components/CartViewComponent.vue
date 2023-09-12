<template>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in objtProduct" :key="product.id">
                                    <td class="image product-thumbnail"><img v-bind:src="'../../../assets/imgs/shop/'+product.product.image+'-1.png'" alt="product image"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a :href="'/products'+ product.product.id">{{ product.product.name  }}</a></h5>
                                        <p class="font-xs">Maboriosam in a tonto nesciung eget <br> distingy magndapibus.
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price"><span>${{ product.product.regular_price }} </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty m-auto">
                                            <input type="number" @change="store.editarCantidad(product.product.id, $event.target.value, props.user)" :value="product.qty" class="form-control" style="width: 80px;">
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>${{ product.qty*product.product.regular_price}} </span>
                                    </td>
                                    <td class="action" data-title="Remove">
                                        <button type="button" class="button" @click="deleteToCart(product.product.id)"><i class="fi-rs-trash"></i></button>
                                        <a href="#" class="text-muted"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        <a class="btn  mr-10 mb-sm-15" href="/checkout"><i class="fi-rs-shuffle mr-10"></i>Pagar</a>
                        <a class="btn " href="/products"><i class="fi-rs-shopping-bag mr-10"></i>Continuar comprando</a>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Total dek carrito</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{totalCarrito}}</span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useCartStore } from '../stores/cart/index';

//porpiedades vue
const props = defineProps({
  user :{
    type : Number,
  }
});

//store
const store = useCartStore();

const objtProduct = ref({});

const cantidad = ref(0);

const totalCarrito = ref(0);

//Evento
onMounted(  () =>{
    store.obtenerProductos();
    objtProduct.value = store.products;

    for (let index = 0; index < objtProduct.value.length; index++) {
        const element = objtProduct.value[index]; 
        totalCarrito.value += parseFloat(element.product.regular_price * element.qty);
    }
})


//Metodos
const addToCart = () => {
    store.agregarProducto(objtProduct.value, cantidad.value);
};

const deleteToCart = (id) => {
    store.eliminarProducto(id);
};

</script>
