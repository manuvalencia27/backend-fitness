import { defineStore } from "pinia";
import state from './state.js';
import actions from './actions.js';

export const useCartStore = defineStore('cart', {
    state,
    actions
});