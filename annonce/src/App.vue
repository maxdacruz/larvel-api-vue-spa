<template>
  <div id="app">
    <v-app>
      <Header />
      <router-view />
    </v-app>
  </div>
</template> 

<script>
import Header from "./components/Header.vue";

export default {
  name: "App",

  components: {
    Header
  },

  data: () => ({
    //
  })
};
</script>
