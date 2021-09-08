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
      authToken: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI4IiwianRpIjoiNjcxMTM1MGM5YjI1YTc5NmYzNTM4NDM4NDRhMWU0OTM4NWQyODZmMzA1NzFkNjllYzQ3ODljYjAwNzk0OTBmNmU1NjFkMjcwNjI0MTJhY2YiLCJpYXQiOjE2MzAxMjYyMDIsIm5iZiI6MTYzMDEyNjIwMiwiZXhwIjoxNjYxNjYyMjAyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.g60G-qR5e2bkYBU88fDnvDSklaIzrNC_jKKzKhgKzSSa5RwyFLfn3kBd05rkK5DgKQcM1TDcuL7UP4L90-24mIGFVjJgV9NK6tzjh0RXt_A5taJQEDK6uwgKPEgxG2NGfSYnGlfgCh5YLdYLHP35qlBnhEuG-62q6VC_05vLgAwMkVPeFsJwClojG8-XWw1bSYB1H9ZgSJ5IiNjVuI01CIgUsHn0ZNFegNJ4I4VGelcS1JQMyYjPfUqDz4BuEnaQtuhA37jzzhL4DhR_PLTMA6av2dj5kVsM_7_GDnVw9F6vwgfVYY3USxuL2LN6N4OZnYlrJCb5-mp001tlspkJBA0U4acI-63XS8WrMuyfrsmqkV7zgRdWoJm7kb6Reuy6zCssDbPqYj1Ns5Y0kBYpFJE4tM3eEpvc_U8mTbhsFEXqNbl-Eng22v1KrtK4qmh6laJLGIgrzqawvpQ5cKhcDmIiLLy0WPA6OkWwg0dUk7W-uqJd8uXmfz6-hYsi7kfcIxtg4VmINNMfhB6js7DikbTzFKzMw7dX1xuSzfIUS2O5LCsIIZSZLYF6Ztf-MlHJ1-5D_MXubNwjZ44Ac1ZNiAfxcP7jHFWFuaLwGGuy1FIMSA001Vp0wEeOqL9vWzI7z13M4iQ0P1OHQfoHCgpQmoESzkSDo9EttVDoAhqWxpg"
    },
  },
  async beforeMount() {
    let res = await Axios.get("http://localhost:8000/api/user-details", {
      headers: {
        Authorization: "Bearer " + this.authToken, 
        Accept: 'application/json'
      },
       
    });
     this.userData = res.data;
    //let res = await Axios.get("http://localhost:8000/api/user-details");
    
  },
};
</script>
