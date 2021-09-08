import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Master from './Master';
import HomePage from './pages/Home';
import ProductPage from './pages/ProductPage'
import CartPage from './pages/Cart'
import CheckoutPage from './pages/Checkout'


Vue.use(BootstrapVue)
Vue.use(VueRouter)
Vue.use(IconsPlugin)
Vue.use(Vuex)

const routes = [
    {
        'name':'home-page',
        'path': '/',
        'component': HomePage
    },
    {
        'name':'product-page',
        'path': '/product/:slug',
        'component': ProductPage
    },
    {
        'name':'checkout-page',
        'path': '/checkout',
        'component': CheckoutPage
    },
    {
        'name':'cart-page',
        'path': '/cart',
        'component': CartPage
    }
];
const router = new VueRouter({
    mode: 'history',
    base: '/',
    fallback: true,
    routes
}); 

const store = new Vuex.Store({
    state: {
      cartItems:[]
    },
    mutations:{
        SET_CART_ITEMS(state,data ){
            state.cartItems.push(data);
        }
    },
    actions:{
        addCartItem({commit}, item){
            commit('SET_CART_ITEMS',item);
        }
    },
    getters:{
        getCartItemsQuantity(state){
            let quantity = 0;
            for(let i = 0; i < state.cartItems.length; i++){
                quantity = quantity + state.cartItems[i].buyQty;

            }
            return quantity;
        },
        getSubTotal(state){
            let subTotal = 0;
            let totalPrice = 0;
            let total = 0;
            for(let i = 0; i < state.cartItems.length; i++){
                subTotal = subTotal + (state.cartItems[i].price * state.cartItems[i].buyQty);
            }
            
        },

        getCartItems(state)
        {
            return state.cartItems;
        }
    }
  })

new Vue({
    router,
    store: store,
    render: h=>h(Master)
}).$mount('#vueApp');