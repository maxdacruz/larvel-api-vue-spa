<template>
  <div class="home">
    <h1>Home Page</h1>
    <v-row dense>
      <v-card
        class="mx-auto mt-4"
        max-width="400"
        v-for="item in annonnces.data"
        :key="item.id"
        :to="{ path: '/annonce/'+  item.id}"
      >
        <v-img
          class="white--text align-end"
          height="200px"
          src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
        ></v-img>

        <v-card-title>{{item.title}}</v-card-title>

        <v-card-text class="text--primary">
          <div>{{item.price}} $</div>
        </v-card-text>
      </v-card>
    </v-row>
  </div>
</template>

<script>
import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000";

export default {
  data: () => ({
    annonnces: []
  }),
  mounted: function() {
    this.test();
  },
  methods: {
    test() {
      axios.get("/api/annonce").then(res => {
        this.annonnces = res.data;
      });
    }
  }
};
</script>
