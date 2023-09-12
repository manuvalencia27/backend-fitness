import './bootstrap';
import { createApp } from 'vue';
import CartViewComponent from './components/CartViewComponent.vue';
import { createPinia } from 'pinia';

const pinia = createPinia();

const app = createApp(CartViewComponent);

app.use(pinia);

app.mount('#view-cart');