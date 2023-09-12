<template>    
    <div class="product-detail accordion-detail">
        <div class="row mb-50">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="detail-gallery">
                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                    <!-- MAIN SLIDES -->
                    <div class="product-image-slider">
                        <figure class="border-radius-10">
                            <img v-bind:src="'../../../assets/imgs/shop/'+image+'-1.png'" alt="product image">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="detail-info">
                    <h2 class="title-detail">{{ name }} {{ slug }}</h2>
                    <div class="product-detail-rating">
                        <div class="pro-details-brand">
                            <span> Catogoría: <a href="#">{{ category }}</a></span>
                        </div>
                    </div>
                    <div class="clearfix product-price-cover">
                        <div class="product-price primary-color float-left" v-if="s_p">
                            <ins><span class="text-brand">{{ s_p }}</span></ins>
                            <ins><span class="old-price font-md ml-15">{{ r_p }}</span></ins>
                        </div>
                        <div class="product-price primary-color float-left" v-else>
                            <ins><span class="text-brand">${{ r_p }}</span></ins>
                        </div>
                    </div>
                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                    <div class="short-desc mb-30">
                        <p> {{ s_desc  }} </p>
                    </div>
                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                    <div class="detail-extralink" v-if="user > 0">
                        <div class="form-group">
                            <input type="number" name="quantity" id="quantity" v-model="cantidad" class="form-control">                                               
                        </div>
                        <div class="product-extra-link2">
                            <button type="button" class="button button-add-to-cart" @click="addToCart">Agregar al carrito</button>
                        </div>
                    </div>
                    <ul class="product-meta font-xs color-grey mt-50">
                        <li class="mb-5">SKU: <a href="#">{{ sku  }}</a></li>
                        <li class="mb-5">Tags: <a href="#" rel="tag">{{ tag }}</a></li>
                        <li>Cantidad disponible:<span class="in-stock text-success ml-5">{{ quantity }} Items En Stock</span></li>
                    </ul>
                </div>
                <!-- Detail Info -->
            </div>
        </div>
        <div class="tab-style3">
            <ul class="nav nav-tabs text-uppercase">
                <li class="nav-item">
                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Descripción</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Comentarios ({{ comments.length }})</a>
                </li>
            </ul>
            <div class="tab-content shop_info_tab entry-main-content">
                <div class="tab-pane fade show active" id="Description">
                    <div class="">
                        <p>{{ desc  }}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="Reviews">
                    <!--Comments-->
                    <div class="comments-area">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mb-30">Comentarios</h4>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex" v-for="comment in comments" :key="comment.id">
                                            <div class="thumb text-center">
                                                <h6><a href="#">{{ comment.user.name }}</a></h6>
                                            </div>
                                            <div class="desc">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <p>{{ comment.comment  }}</p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-xs mr-30">{{ comment.created_at }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single-comment -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--comment form-->
                    <div class="comment-form">
                        <h4 class="mb-15">Add a review</h4>
                        <div class="product-rate d-inline-block mb-30">
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <form class="form-contact comment_form" action="#" id="commentForm">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="button button-contactForm">Submit
                                            Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                            
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useCartStore } from '../stores/cart/index';

//porpiedades vue
const props = defineProps({
  id: {
    type: Number,
    required: true,
    default: 0,
  },
  user :{
    type : Number,
  }
});

//store
const store = useCartStore();

//Variables mutables para mostrar
const name = ref("");
const slug = ref("");
const s_desc = ref("");
const desc = ref("");
const r_p = ref(0);
const s_p = ref(0);
const sku = ref("");
const stock_status = ref("");
const quantity = ref(0);
const image = ref("");
const tag = ref("");
const category = ref("");
const comments = ref("");

const objtProduct = ref({});

const cantidad = ref(0);

//Evento
onMounted(  () =>{
    //consultar detalle del producto en el api
    axios.get('/api/products/'+props.id)
    .then(( productResponse ) => {
        const product = productResponse.data;

        objtProduct.value = product;

        name.value = product.name;
        slug.value = product.slug;
        s_desc.value = product.short_description;
        desc.value = product.description;
        r_p.value = product.regular_price;
        s_p.value = product.sale_price;
        sku.value = product.SKU;
        stock_status.value = product.stock_status;
        quantity.value = product.quantity;
        image.value = product.image;
        tag.value = product.tag.name;
        category.value = product.category.name;
        comments.value = product.comments;
    });

    store.obtenerProductos();
})


//Metodos
const addToCart = () => {

    //validación que el stock no sea menor a lo que estamos pidiendo
    if (quantity.value < cantidad.value) {
        return;
    }
    store.agregarProducto(objtProduct.value, cantidad.value, props.user);
};

</script>