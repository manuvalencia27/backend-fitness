import './bootstrap';
import { createApp } from 'vue';
import CheckoutComponent from './components/CheckoutComponent.vue';
import { createPinia } from 'pinia';

const pinia = createPinia();

const el = document.getElementById("checkout");

const app = createApp(CheckoutComponent, {
    user: JSON.parse(el.getAttribute('data-user'))
});

app.use(pinia);

app.mount('#checkout');