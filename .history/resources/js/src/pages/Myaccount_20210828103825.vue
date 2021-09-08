<template>
  <div class="content-center">
    <h1>Dashboard my account</h1>
  </div>
</template>
<script>
import Axios from "axios";
export default {
  data: {
    return() {
      userData: "";
    },
  },
  async beforeMount() {
    axios.get("https://example.com/getSomething", {
      headers: {
        Authorization: "Bearer " + token, //the token is a variable which holds the token
      },
    });
    let res = await Axios.get("http://localhost:8000/api/user-details");
    this.userData = res.data;
  },
};
</script>
