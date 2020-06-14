<template>
  <div id="app">
    <v-app>
      <Header />
      <v-content>
        <v-main>
          <router-view />
        </v-main>
      </v-content>
    </v-app>
  </div>
</template> 



<script>
import Header from "./components/Header.vue";
//import Search from "./components/Search.vue";

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
