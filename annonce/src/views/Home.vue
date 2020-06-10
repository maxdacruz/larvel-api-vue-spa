<template>
  <div class="home">
    <v-app>
      <v-content>
        <h1>Home Page</h1>
        <v-container fluid>
          <v-row dense>
            <v-card class="mx-auto" max-width="400" v-for="item in annonnces.data" :key="item.id">
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
        </v-container>
      </v-content>
    </v-app>
  </div>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;
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
      axios.get("sanctum/csrf-cookie").then(() => {
        axios.get("/api/annonce").then(res => {
          this.annonnces = res.data;
        });
      });
    }
  }
};
</script>
