<template>
  <v-app-bar dense dark app flat>
    <v-navigation-drawer v-model="sidebar" absolute temporary app>
      <v-list nav dense>
        <v-list-item v-for="item in menuItems" :key="item.title" :to="item.path">
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>{{ item.title }}</v-list-item-content>
        </v-list-item>
        <div v-if="$store.state.auth">
          <button @click="logout">Logout</button>
        </div>
        <div v-else>
          <v-list-item v-for="item in notLoged" :key="item.title" :to="item.path">
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>{{ item.title }}</v-list-item-content>
          </v-list-item>
        </div>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar-nav-icon @click.stop="sidebar = !sidebar" class="hidden-sm-and-up"></v-app-bar-nav-icon>

    <v-toolbar-title>Page title</v-toolbar-title>

    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-xs-only">
      <v-btn v-for="item in menuItems" :key="item.title" :to="item.path">
        <v-icon left dark>{{ item.icon }}</v-icon>
        {{ item.title }}
      </v-btn>
      <v-btn v-if="$store.state.auth" @click="logout">Logout</v-btn>
      <v-btn v-else v-for="item in notLoged" :key="item.title" :to="item.path">
        <v-icon left dark>{{ item.icon }}</v-icon>
        {{ item.title }}
      </v-btn>
    </v-toolbar-items>
  </v-app-bar>
</template>

<script>
export default {
  components: {},
  methods: {
    logout() {
      this.$store.dispatch("logout");
      //redirect
    }
  },
  data() {
    return {
      appTitle: "Site Name",
      sidebar: false,
      menuItems: [
        { title: "Home", path: "/", icon: "mdi-home" },
        { title: "About", path: "/about", icon: "" },
        { title: "Add Annonce", path: "/NewAnnonce", icon: "" }
      ],
      notLoged: [
        { title: "Login", path: "/login", icon: "mdi-face" },
        { title: "Register", path: "/register", icon: "mdi-lock" }
      ]
    };
  }
};
</script>
