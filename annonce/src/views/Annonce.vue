<template>
  <v-card class="mx-auto mt-4" max-width="400">
    <v-img
      class="white--text align-end"
      height="200px"
      src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
    ></v-img>

    <v-card-title>{{annonce.title}}</v-card-title>

    <v-card-text class="text--primary">
      <div>{{annonce.price}} $</div>
      <div>{{annonce.description}}</div>
    </v-card-text>
  </v-card>
</template>

<script>
import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000";

export default {
  data: () => ({
    annonce: {}
  }),
  mounted: function() {
    this.test();
  },
  methods: {
    test() {
      console.log();
      axios.get("/api/annonce/" + this.$route.params.id).then(res => {
        this.annonce = res.data.data;
        console.log(this.annonce);
      });
    }
  }
};
</script>
