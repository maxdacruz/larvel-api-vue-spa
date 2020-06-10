<template>
  <div class="about">
    <v-app>
      <h1>This is an about page</h1>
      <button @click="test">Test</button>
    </v-app>
  </div>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:8000";

export default {
  methods: {
    test() {
      axios.get("sanctum/csrf-cookie").then(() => {
        console.log("test");

        axios.get("/api/io").then(res => {
          console.log(res);
        });
      });
    }
  }
};
</script>
