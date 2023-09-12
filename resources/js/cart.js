import './bootstrap';
import { createApp } from 'vue';
import CartComponent from './components/CartComponent.vue';
import { createPinia } from 'pinia';

const pinia = createPinia();

const app = createApp(CartComponent);

app.use(pinia);

app.mount('#cart-component');
