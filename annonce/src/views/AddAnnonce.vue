<template>
  <v-content>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-card class="elevation-12">
          <v-toolbar color="primary" dark flat>
            <v-toolbar-title>Add</v-toolbar-title>
            <v-spacer></v-spacer>
          </v-toolbar>
          <v-card-text>
            <v-form ref="form">
              <v-text-field v-model="title" label="title" name="title" type="text"></v-text-field>
              <v-text-field v-model="price" label="price" name="price" type="number"></v-text-field>
              <v-text-field
                v-model="description"
                label="description"
                name="description"
                type="text"
              ></v-text-field>
              <div>
                <el-upload
                  action="#"
                  :on-change="updateImageList"
                  list-type="picture-card"
                  :on-preview="handlePictureCardPreview"
                  :auto-upload="false"
                >
                  <i class="el-icon-plus"></i>
                </el-upload>
                <el-dialog :visible.sync="dialogVisible">
                  <img width="100%" :src="dialogImageUrl" alt />
                </el-dialog>
              </div>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="add" color="primary">Add</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-content>
</template>
<style >
.v-application ul,
.v-application ol {
  padding-left: 0;
}
</style>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:8000";
export default {
  data: () => ({
    imageList: [],
    description: "",
    title: "",
    price: "",
    dialogImageUrl: "",
    dialogVisible: false
  }),

  methods: {
    updateImageList(file) {
      this.imageList.push(file.raw);
      console.log(this.imageList);
    },

    handlePictureCardPreview(file) {
      this.dialogImageUrl = file.url;
      this.dialogVisible = true;
    },

    add() {
      let formData = new FormData();
      formData.append("title", this.title);
      formData.append("price", this.price);
      formData.append("description", this.description);
      formData.append("images", this.imageList);

      this.imageList.forEach(function(image, key) {
        formData.append(`images[` + key + `]`, image);
      });

      axios.get("sanctum/csrf-cookie").then(() => {
        axios
          .post("/api/annonce", formData, {
            headers: { "Content-Type": "multipart/form-data" }
          })
          .then(res => {
            console.log(res);
          })
          .catch(error => {
            console.log(error);
          });
      });
    }
  },
  computed: {}
};
</script>