<template>
  <div class="login">
    <h1>Login</h1>
    <form @submit.prevent="login">
      <input v-model="form.email" type="email" placeholder="email" />
      <br />
      <input v-model="form.password" type="password" placeholder="password" />
      <br />
      <button>Login</button>
    </form>
  </div>
</template>

<script>
export default {
  data: () => ({
    form: {
      email: "yolo@gmail.com",
      password: "azeazeaze"
    }
  }),

  methods: {
    async login() {
      this.$store.dispatch("login", this.form);
      return this.$router.replace("/");
    }
  }
};
</script>
