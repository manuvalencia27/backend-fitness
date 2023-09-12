import './bootstrap';
import { createApp } from 'vue';
import CartViewComponent from './components/CartViewComponent.vue';
import { createPinia } from 'pinia';

const pinia = createPinia();

const el = document.getElementById("view-cart");

const app = createApp(CartViewComponent, {
    user: JSON.parse(el.getAttribute('data-user'))
});

app.use(pinia);

app.mount('#view-cart');