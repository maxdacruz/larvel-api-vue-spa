<template>
  <v-app id="register">
    <v-content>
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="4">
            <v-card class="elevation-12">
              <v-toolbar color="primary" dark flat>
                <v-toolbar-title>Login</v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field label="E-mail" name="email" prepend-icon="mdi-account" type="text"></v-text-field>
                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                  ></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn @click="register" color="primary">Register</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:8000";

export default {
  data: () => ({
    form: {
      name: "test",
      email: "test@gmail.com",
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
