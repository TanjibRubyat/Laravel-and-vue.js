<template>
  <div class="content-center background" style="align-content: center">
    <h1 class="pt-4">Dashboard</h1>

    <div class="name">
      <p>
        <strong>Name: </strong> <span>{{ userData.name }}</span>
      </p>
      <p>
        <strong>Email: </strong> <span>{{ userData.email }}</span>
      </p>
    </div>
  </div>
</template>
<script>
import Axios from "axios";
import $api from "./api";
export default {
  data() {
    return {
      userData: "",
    };
  },
  async beforeMount() {
    let res = await this.$store.dispatch("loadUserDetails");
    this.userData = res.data;

    //let token = await $api.get("/user-login")
  },
};
</script>
<style>
.name p strong{
  font-family: sans-serif;
  font-weight: bold;
  font-size: 2rem;
  margin: 0 30px;
  /* padding-top: 400px; */
}

.content-center .name span {
  color: #000000db;
  font-size: 2rem;
  font-weight: 600;
}

.background{
  background-color: rgb(19 20 20 / 11%);
  height: 380px;
}
</style>