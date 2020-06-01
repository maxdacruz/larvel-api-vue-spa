 <template>
  <div id="nav">
    <router-link to="/">Home</router-link>|
    <router-link to="/about">About</router-link>|
    <template v-if="$store.state.auth">
      <button @click="logout">Logout</button>
    </template>
    <template v-else>
      <router-link to="/login">Login</router-link>|
      <router-link to="/register">Register</router-link>
    </template>
  </div>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$store.dispatch("logout");
      //redirect
    }
  }
};
</script>