<template>
  <div>
    <v-app-bar dense dark>
      <v-navigation-drawer v-model="sidebar" absolute temporary>
        <v-list nav>
          <v-list-item-group>
            <div v-for="item in menuItems" :key="item.title" :to="item.path">
              <v-list-item-action>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>{{ item.title }}</v-list-item-content>
            </div>
            <div v-if="$store.state.auth">
              <button @click="logout">Logout</button>
            </div>
            <div v-else v-for="item in notLoged" :key="item.title" :to="item.path">
              <v-list-item-action>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>{{ item.title }}</v-list-item-content>
            </div>
          </v-list-item-group>
        </v-list>
      </v-navigation-drawer>

      <v-app-bar-nav-icon @click.stop="sidebar = !sidebar"></v-app-bar-nav-icon>

      <div>
        <v-toolbar-title class="font-weight-bold mb-3">Page title</v-toolbar-title>
      </div>

      <v-spacer></v-spacer>
      <v-toolbar-items>
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
  </div>

  <!-- <div id="nav">
    <router-link to="/">Home</router-link>|
    <router-link to="/about">About</router-link>|
    <template v-if="$store.state.auth">
      <button @click="logout">Logout</button>
    </template>
    <template v-else>
      <router-link to="/login">Login</router-link>|
      <router-link to="/register">Register</router-link>
    </template>
  </div>-->
</template>

<script>
export default {
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
        { title: "About", path: "/about", icon: "" }
      ],
      notLoged: [
        { title: "Sign Up", path: "/register", icon: "mdi-face" },
        { title: "Sign In", path: "/login", icon: "mdi-lock" }
      ]
    };
  }
};
</script>
