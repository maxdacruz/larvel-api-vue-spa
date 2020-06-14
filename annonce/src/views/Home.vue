<template>
  <div class="home">
    <v-navigation-drawer v-model="io" fixed stateless class="mt-12 hidden-xs-only">
      <v-list dense rounded>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>test</v-list-item-title>
            <v-list-item-title>test</v-list-item-title>
            <v-list-item-title>test</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-row>
      <v-card
        class="mx-auto mt-4"
        max-width="400"
        v-for="item in annonnces.data"
        :key="item.id"
        :to="{ path: '/annonce/'+  item.id}"
      >
        <v-img
          class="white--text align-end"
          height="200px"
          src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
        ></v-img>

        <v-card-title>{{item.title}}</v-card-title>

        <v-card-text class="text--primary">
          <div>{{item.price}} $</div>
        </v-card-text>
      </v-card>
    </v-row>
    <div class="text-center">
      <v-pagination v-model="page" :length="6" @input="onPageChange"></v-pagination>
    </div>
  </div>
</template>

<style >
@media only screen and (min-width: 600px) {
  .row {
    padding-left: 268px;
  }
}
</style>

<script>
import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000";

export default {
  data: () => ({
    annonnces: [],
    page: 1,
    io: true
  }),
  mounted: function() {
    this.test();
  },
  methods: {
    test() {
      axios.get("/api/annonce?page=" + this.page).then(res => {
        this.annonnces = res.data;
      });
    },
    onPageChange() {
      this.test();
      window.scrollTo(0, 0);
    }
  }
};
</script>
