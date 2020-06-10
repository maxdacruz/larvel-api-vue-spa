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
                <v-form ref="form" v-model="valid">
                  <v-text-field
                    v-model="name"
                    :rules="nameRules"
                    label="Name"
                    name="Name"
                    prepend-icon="mdi-account"
                    type="text"
                  ></v-text-field>
                  <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    name="email"
                    prepend-icon="mdi-account"
                    type="text"
                  ></v-text-field>
                  <v-text-field
                    v-model="password"
                    :rules="passwordRules"
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="show ? 'text' : 'password'"
                    @click:append="show = !show"
                  ></v-text-field>
                  <v-text-field
                    v-model="password_confirm"
                    :rules="[passwordMatch, password_confirmRules]"
                    id="password_confirm"
                    label="Confirm Password"
                    name="password_confirm"
                    prepend-icon="mdi-lock"
                    :type="show ? 'text' : 'password'"
                    :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                    @click:append="show = !show"
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
    show: false,
    errorMessage: "",
    valid: false,
    email: "",
    name: "",
    nameRules: [v => !!v || "Name is required"],
    emailRules: [
      v => !!v || "E-mail is required",
      v => /.+@.+/.test(v) || "E-mail must be valid"
    ],
    password: "",
    passwordRules: [
      v => !!v || "Paswword is required",
      v => (v && v.length >= 8) || "Password must have 7+ characters",
      v => /(?=.*[A-Z])/.test(v) || "Must have one uppercase character",
      v => /(?=.*\d)/.test(v) || "Must have one number"
    ],
    password_confirm: "",
    password_confirmRules: v => !!v || "Field is required"
  }),
  computed: {
    passwordMatch() {
      return () =>
        this.password === this.password_confirm || "Password must match";
    }
  },
  methods: {
    async register() {
      if (this.$refs.form.validate()) {
        this.$store
          .dispatch("register", {
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirm: this.password_confirm
          })
          .then(() => {
            this.$router.replace("/");
          })
          .catch(error => {
            console.log(error.response.data.message);
            this.errorMessage = error.response.data.message;
          });
      }
    }
  }
};
</script>
