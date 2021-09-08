<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-color">
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
              <router-link class="font" :to="{ name: 'home-page' }"
                >Home</router-link
              >
            </li>
            <li class="nav-item padding-left pt-1">
              <router-link
                class="font"
                :to="{ name: 'product-page', params: { slug: 'products' } }"
                >Products</router-link
              >
            </li>

            <li class="nav-item padding-left pt-1">
              <b-dropdown id="dropdown-1" text="Dropdown Button" class="m-md-2 category-button-background">
                <router-link
                  class="d-block mb-2 bg-info"
                  :to="{ name: 'category-page', params: { id: category.id } }"
                  v-for="(category, index) in categories"
                  :key="index"
                >
                  {{ category.name }}
                </router-link>
              </b-dropdown>
            </li>
            <li>
              <router-link
                class="btn btn-outline text-danger"
                :to="{ name: 'cart-page' }"
                >Cart- {{ $store.getters.getCartItemsQuantity }}</router-link
              >
            </li>
          </ul>
          <ul class="decoration">
            <li>
              <router-link
                :to="{name:'login-page'}"
                v-if="$store.getters.isLogin"
                class="float-right font"
                v-on:click.native="userLogout"
                >Logout</router-link
              >
              <router-link
                v-else
                class="float-right font"
                :to="{ name: 'login-page' }"
                >Login</router-link
              >
            </li>
            <li>
              <router-link
                class="float-right padding-left font"
                :to="{}"
                v-if="$store.getters.isLogin"
                ></router-link
              >
              <router-link
                v-else
                class="float-right padding-left font"
                :to="{ name: 'register-page' }"
                >Register</router-link
              >
            </li>
          </ul>
          <form class="d-flex padding-left">
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

<script>
import Axios from "axios";
export default {
  data() {
    return {
      categories: "",
    };
  },

  methods: {
    userLogout() {
      this.$store.dispatch("logout");
    },
  },

  async beforeMount() {
    let res = await Axios.get("http://localhost:8000/api/category");
    this.categories = res.data.data;
  },
};
</script>
<style>
.navbar-color{
  background-color: #bdc3c7;
}
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

.position-fixed {
  position: sticky;
}

.decoration {
  text-decoration: none;
  outline: none;
  display: flex;
  font-family: "Times New Roman", Times, serif;
  font-weight: 200;
}

.font {
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
    "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  font-weight: normal;
  font-size: 1rem;
}

.font:hover {
  color: coral;
}

.background {
  background-color: white;
}

.category-button-background{
  background-color: #6c757d;
}
</style>