<template>
  <div class="content-center">
    <h1>Dashboard my account</h1>
    <p>
        {{userData.name}}
    </p>
  </div>
</template>
<script>
import Axios from "axios";
export default {
  data() {
    return {
      userData: "",
      authToken: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI4IiwianRpIjoiNTNlN2YwZjMwN2VkOWJhZTMyYWNmM2ZkZjIwNjNlMzgwMjhhN2Y3MTRjNTNjMjdiMzNhNGJiNGFiMTY1ZGQ4MmMzYmRkZjdlNjUyZTRjY2MiLCJpYXQiOjE2MzAxNzA0MjAsIm5iZiI6MTYzMDE3MDQyMCwiZXhwIjoxNjYxNzA2NDIwLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.vqOrxXmuIqucPEpGZ_Fd0wZCBlDm1yWdjdXvuwo5S_ECY57_Th_BTk-VhwhpaZYcgrDV2T14OZDHwiKv9HQBe7ysWkpz6tftK4jI4mBDMOTOMD22RnQL6woiwMLLuOeyaAbRomGw8timcMmROgaoN5FUeSVsDFuevUw5vdVa0RKoS2uqlhBlGMUZsr6yyTCOf4UHZX-KQD6Ap5eW6GwYg4HlDqCz_h1vDzj3auY6LV6ya3vnohK40oga9uc6up03dZPJA7Cj6Ve5w9JD5i0Ml-RQFrBV7QcS6cjJdH8e5b5GuVKN7BR2FetTwj04A5dM9ZZD_DGUdPyFD3h5-im2Ru9gvfFz5HIITXxnC3MND8dFta8PoHc-0HGeQKck9wCSYCC7dpeDl12gBZ99Kd6JwQoSiOXCDSsezI2iLSPPrgsspEWKuWEX1BmJXBUXjXaowirpoegxmM-C4WHR-g6Y-HlZhA5LYnnjghrqLtMvMNv_z4kbOO9y3UkqSmvBTfYCI2Z7bzM-q7iGz-bDeV2SeUL3JwdPMZxKCa5poPP1mmiPNLBbA4tP74BdcKRgzlarob-12-yvSmPMZHVoKROWx4FOwCH29FsYN4WECycfD-AYKTeD2B6pFJpBIV3uM1w4hgdvuyK4HTXfwoEznrkhB-Eiu6m8fet6O3RTrfte474"
    }
  },
  async beforeMount() {
    let res = await Axios.get("http://localhost:8000/api/user-details", {
      headers: {
        Authorization: "Bearer " + this.authToken, 
        Accept: 'application/json'
      },
       
    });
     this.userData = res.data;
     let token = await Axios.get("http://localhost:8000/api/user-login")

    //let res = await Axios.get("http://localhost:8000/api/user-details");
    
  },
};
</script>
