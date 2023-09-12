import './bootstrap';
import { createApp } from 'vue';
import ProductComponent from './components/ProductComponent.vue';
import { createPinia } from 'pinia';

const pinia = createPinia();

const el = document.getElementById("product-detail");

const app = createApp(ProductComponent, {
    id:parseInt(el.getAttribute('data-id')),
});

app.use(pinia);

app.mount('#product-detail');
