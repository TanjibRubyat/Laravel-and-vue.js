import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Master from './Master';
import HomePage from './pages/Home';
import ProductPage from './pages/ProductPage'
import CartPage from './pages/Cart'
import CheckoutPage from './pages/Checkout'
import CheckoutSuccess from './pages/CheckoutSuccess'
import CheckoutFailure from './pages/CheckoutFailure'
import LoginPage from './pages/Login'
import RegisterPage from './pages/Register'
import MyaccountPage from './pages/Myaccount'
import CategoryPage from './pages/CategoryPage'
import Axios from 'axios'


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
        'name': 'category-page',
        'path': '/category/:id',
        'component': CategoryPage
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
    },
    {
        'name':'checkout-success',
        'path': '/checkout-success',
        'component': CheckoutSuccess
    },
    {
        'name':'checkout-failure',
        'path': '/checkout-failure',
        'component': CheckoutFailure
    },
    {
        'name':'login-page',
        'path':'/login-page',
        'component':LoginPage
    },
    {
        'name': 'register-page',
        'path':'/registr-page',
        'component':RegisterPage
    },
    {
        'name': 'myaccount-page',
        'path': '/myaccount-page',
        'component': MyaccountPage
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
      cartItems:[],
      authToken:null,
      userDetails:{}
    },
    mutations:{
        SET_CART_ITEMS(state,data ){
            state.cartItems.push(data);
        },

        DELETE_CART_ITEMS(state,data){
            state.cartItems.pop(data)
        },

        SET_AUTH_TOKEN(state, token){
            state.authToken = token
        },

        SET_USER_DETAILS(state, details){
            state.userDetails = details
        }
    }, 
    actions:{
        addCartItem({commit}, item){
            commit('SET_CART_ITEMS',item);
            //localStorage.setItem('cart_items',item)
        },

        deleteCartItem({commit}, item){
            commit('DELETE_CART_ITEMS',item);
        },

        async login({commit}, credential){
            let res = await Axios.post('http://127.0.0.1:8000/api/user-login',credential)
            let authToken = res.data.data.auth_token
            commit('SET_AUTH_TOKEN', authToken)
            localStorage.setItem('auth_token',authToken)
            return res
        },
        
        async logout({commit}){
            // let res = await Axios.post('http://127.0.0.1:8000/api/user-login',credential)
            commit('SET_AUTH_TOKEN', null)
            localStorage.removeItem('auth_token')
        },

        async loadUserDetails({commit,getters}){
            //console.log(state)
            let res = await Axios.get("http://127.0.0.1:8000/api/user-details", {
                headers: {
                  Authorization: "Bearer " + getters.getAuthToken, 
                  Accept: 'application/json'
                }
                
            });
            return res
        },
        
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
            for(let i = 0; i < state.cartItems.length; i++){
                subTotal = subTotal + (state.cartItems[i].price * state.cartItems[i].buyQty);
            }
            return subTotal;
            
        },

        getCartItems(state)
        {
            //return state.cartItems;
            if(state.cartItems.length>0){
                return state.cartItems
            }else{
                return localStorage.getItem('cart_items')
            }
        },

        getAuthToken(state){
            if(state.authToken!==null){
                return state.authToken
            }else if(localStorage.getItem('auth_token')!==undefined){
               return localStorage.getItem('auth_token') 
            }
            return null
        },
        isLogin(state,getters){
            let token =  getters.getAuthToken;
            if(token !== null){
                return true;
            }else{
                return false;
            }

        }
    }
  
});
new Vue({
    router,
    store: store,
    render: h=>h(Master)
}).$mount('#vueApp');