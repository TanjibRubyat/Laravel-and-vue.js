<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <router-link class="navbar-brand pb-3" :to="{ name: 'home-page' }"
          >Eshop</router-link
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-lg-0">
            <li class="nav-item padding-left pt-1">
              <router-link :to="{ name: 'home-page' }">Home</router-link>
            </li>
            <li class="nav-item padding-left pt-1">
              <router-link
                :to="{ name: 'product-page', params: { slug: 'products' } }"
                >Products</router-link
              >
            </li>
            <li class="nav-item position">
              <b-nav-item-dropdown text="Categories">
                <b-dropdown-item href="#">EN</b-dropdown-item>
                <b-dropdown-item href="#">ES</b-dropdown-item>
                <b-dropdown-item href="#">RU</b-dropdown-item>
                <b-dropdown-item href="#">FA</b-dropdown-item>
              </b-nav-item-dropdown>
            </li>
            <li>
              <router-link class="btn btn-outline text-danger"  :to="{name: 'cart-page'}">Cart- {{ $store.getters.getCartItemsQuantity}}</router-link>
            </li>
          </ul>
          <b-nav-item class="auth">
              <router-link class="float-right"  :to="{name: 'login-page'}">Login</router-link>
          </b-nav-item>
          <b-nav-item class="auth">
               <router-link class="float-right"  :to="{name: 'register-page'}">Register</router-link>
               </b-nav-item>
          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
  </header>
</template>
<style>
.gradient {
  background-color: linear-gradient(135deg, #43cea2, #185a9d);
}

.padding-left {
  padding-left: 20px;
}

.position {
  position: relative;
  top: 1px;
  align-content: center;
  padding-left: 10px;
}

.position-fixed{
  position: sticky;
}

.auth{
  text-decoration: none;
}
</style>