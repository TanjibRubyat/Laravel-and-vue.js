<template>
  <header>
    
      <b-navbar class="gradient" toggleable="lg" type="light" variant="light">
        <b-navbar-brand href="#">NavBar</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item><router-link :to="{name: 'home-page'}">Home</router-link></b-nav-item>
            <b-nav-item><router-link :to="{name: 'product-page', params: {slug: 'products'}}">Products</router-link></b-nav-item>
            <b-nav-item><router-link :to="{name: 'cart-page'}">Cart</router-link></b-nav-item>
            <!--<b-nav-item><router-link :to="{name: 'checkout-page', params: {slug: 'checkout'}}">Checkout</router-link></b-nav-item>-->
            <!--<b-nav-item href="#" disabled>Disabled</b-nav-item>-->
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">
            <b-nav-form>
              
              <b-form-input
                size="sm"
                class="mr-sm-2"
                placeholder="Search"
              ></b-form-input>
              <b-button size="sm" class="my-2 my-sm-0" type="submit"
                >Search</b-button
              >
            </b-nav-form>
                        <b-nav-item><router-link class="btn btn-outline text-danger"  :to="{name: 'cart-page'}">Cart- {{ $store.getters.getCartItemsQuantity}}</router-link></b-nav-item>

          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    
  </header>
</template>
<style lang="">
  .gradient{
    background-color: linear-gradient(135deg, #43cea2,  #185a9d)
  }
</style>