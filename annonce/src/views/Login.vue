<template>
  <v-container class="fill-height" fluid>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-card class="elevation-12">
          <v-toolbar color="primary" dark flat>
            <v-toolbar-title>Login</v-toolbar-title>
            <v-spacer></v-spacer>
          </v-toolbar>
          <v-card-text>
            <v-form v-model="valid" ref="form">
              <v-text-field
                v-model="email"
                :rules="emailRules"
                required
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
                :type="show ? 'text' : 'password'"
                required
                :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                @click:append="show = !show"
              ></v-text-field>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <p class="red--text">{{errorMessage}}</p>
            <v-spacer></v-spacer>
            <v-btn @click="login" color="primary">Login</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    show: false,
    errorMessage: "",
    valid: false,
    email: "",
    emailRules: [
      v => !!v || "E-mail is required",
      v => /.+@.+/.test(v) || "E-mail must be valid"
    ],
    password: "",
    passwordRules: [v => !!v || "Paswword is required"]
  }),

  methods: {
    async login() {
      if (this.$refs.form.validate()) {
        this.$store
          .dispatch("login", {
            email: this.email,
            password: this.password
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
