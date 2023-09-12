import { defineStore } from "pinia";
import state from "@/stores/checkout/state";
import actions from "@/stores/checkout/actions";

export const useCheckoutStore = defineStore('checkout', {
    state,
    actions,
});