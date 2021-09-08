<template>
    <div>
    <b-container>
      <b-row>
       
        <b-col-sm-8 class="pt-4">
            <b-container>
                <b-row>
                    <b-col-sm-6>
                        <b-card>
                            <h1>Image</h1>
                        </b-card>
                    </b-col-sm-6>
                    <b-col-sm-6>
                        <b-card>
                            <h4>Name</h4>
                            <h5>Price</h5>
                            <p>Description</p>
                        </b-card>
                    </b-col-sm-6>
                </b-row>
            </b-container>
        </b-col-sm-8>
      </b-row>
    </div>
</template>

<script>
import AppHeader from "./components/Header";
import AppSidebar from "./components/Sidebar";
export default {
  components: {
    AppHeader,
    AppSidebar,
  },
};
</script>