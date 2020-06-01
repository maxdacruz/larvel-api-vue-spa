<template>
  <div class="login">
    <h1>Login</h1>
    <form @submit.prevent="register">
      <input v-model="form.name" type="text" placeholder="name" />
      <br />
      <input v-model="form.email" type="email" placeholder="email" />
      <br />
      <input v-model="form.password" type="password" placeholder="password" />
      <br />
      <button>Register</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:8000";

export default {
  data: () => ({
    form: {
      name: "yolo",
      email: "yolo@gmail.com",
      password: "azeazeaze",
      password_confirmation: "azeazeaze"
    }
  }),
  methods: {
    register() {
      axios.get("sanctum/csrf-cookie").then(() => {
        axios.post("/register", this.form).then(res => {
          console.log(res);
        });
      });
    }
  }
};
</script>
