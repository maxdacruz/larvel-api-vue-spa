<template>
  <div class="home">
    <v-navigation-drawer v-model="sidebar" fixed stateless class="mt-12 hidden-xs-only">
      <v-list dense rounded>
        <v-list-item class="flex-column align-start">
          <v-checkbox hide-details v-model="selected.etat" label="neuf" value="neuf"></v-checkbox>
          <v-checkbox hide-details v-model="selected.etat" label="user" value="user"></v-checkbox>
          <v-checkbox hide-details v-model="selected.etat" label="comme neuf" value="comme neuf"></v-checkbox>
        </v-list-item>
        <v-list-item class="flex-column align-start">
          <v-checkbox hide-details v-model="selected.livraison" label="envoie" value="envoie"></v-checkbox>
          <v-checkbox hide-details v-model="selected.livraison" label="elevement" value="elevement"></v-checkbox>
        </v-list-item>
        <v-list-item>
          <v-select v-model="selected.ordre" :items="items" filled label="filter" @change="pom"></v-select>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-row class="mb-6" justify="center">
      <v-col cols="etat">
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-col>
    </v-row>
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
          <div>{{item.etat}}</div>
          <div>{{item.livraison}}</div>
        </v-card-text>
      </v-card>
    </v-row>
    <div class="text-center">
      <v-pagination v-model="page" :length="6" @input="onPageChange"></v-pagination>
    </div>
  </div>
</template>

<style >
.v-input--selection-controls {
  margin-top: 0 !important;
}
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
    iop: [],
    page: 1,
    sidebar: true,
    search: "",
    selected: { etat: [], livraison: [], ordre: "" },
    items: ["Price lowest", "Price Highest", "Date new", "Date old"]
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
    },
    pom() {
      axios
        .get("/api/annonce", { params: this.selected })
        .then(res => {
          this.annonnces = res.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
