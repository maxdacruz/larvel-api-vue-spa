<template>
  <div id="app">
    <v-app>
      <Header />
      <v-content>
        <Search />
        <router-view />
      </v-content>
    </v-app>
  </div>
</template> 



<script>
import Header from "./components/Header.vue";
import Search from "./components/Search.vue";

export default {
  name: "App",
  components: {
    Header,
    Search
  },

  data: () => ({
    //
  })
};
</script>
