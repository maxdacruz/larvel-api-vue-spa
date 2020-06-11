<template >
  <v-toolbar dark>
    <v-select :items="categ" item-value="id" item-text="name" return-object label="categories" solo>
      <template v-slot:selection="{item}">{{ item.name }}</template>
      <template v-slot:item="{item}">{{ item.name }}</template>
    </v-select>
  </v-toolbar>
</template>

<script>
import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000";

export default {
  data: () => ({
    categ: [
      {
        id: 1,
        name: "Vehicules"
      },
      {
        id: 2,
        name: "Location"
      },
      {
        id: 3,
        name: "Emploi"
      },
      {
        id: 4,
        name: "Mode"
      },
      {
        id: 5,
        name: "Hi-Tech"
      },
      {
        id: 6,
        name: "Habitation"
      },
      {
        id: 7,
        name: "Loisirs et Divertissement"
      },
      {
        id: 8,
        name: "Autre"
      }
    ]
  })
};
</script>