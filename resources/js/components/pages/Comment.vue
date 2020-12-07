<template>
  <div>
    <div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">Comment Here</div>
            <div class="card-body">
              <div>
                <p>Typing: {{ name }} / {{ country }} / {{ salary }} / {{ comment }}</p>
                <input v-model="name" type="text" placeholder="Enter Name " class="form-control mt-1" />
                <input v-model="country" type="text" placeholder="Country" class="form-control mt-1" />
                <input v-model="salary" type="text" placeholder="Salary" class="form-control mt-1" />
                <input v-model="comment" type="text" name="comment" placeholder="Comment Here " class="form-control" />
                <input type="button" @click="addComment" class="btn btn-sm btn-info mt-4" value="Save" />
              </div>
            </div>
          </div>
          <hr class="d-sm-none" />
        </div>
        <div class="col-sm-8">
          <!-- Router View Content  -->
          <div class="card">
            <div class="card-header">This Section is for Normal Content</div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Search By :</span>
                    </div>
                    <b-form-select class="form-control col-8" v-model="searchBy" :options="options" text-field="name" value-field="value"> </b-form-select>
                  </div>
                </div>
                <div class="form-group col-6">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search ..." v-model="searchData" @keyup.enter="search" @focusout="check" />
                    <div class="input-group-append">
                      <span class="input-group-text"> <i class="fa fa-search" style="color: skyblue" @click="search"></i></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered table-sm">
                  <thead class="text-center">
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Salary</th>
                    <th>Comments</th>
                  </thead>
                  <tbody class="text-center">
                    <tr v-for="(com, index) in comments">
                      <td>{{ index + 1 }}</td>
                      <td>{{ com.name }}</td>
                      <td>{{ com.country }}</td>
                      <td>{{ com.salary }}</td>
                      <td>{{ com.comments }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <span> <pagination :meta="meta" :offset="5" v-if="commentsCondition" v-on:pagination="loadComments"></pagination></span>
                  <span> <pagination :meta="meta" :offset="5" v-if="searchCondition" v-on:pagination="search"></pagination></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
//import Pagination from "./Pagination.vue";
import Pagination from ".././pages/Pagination2";

export default {
  components: { Pagination },

  data: function () {
    return {
      name: "",
      country: "",
      salary: "",
      comment: "",
      comments: {},
      loading: true,
      searchCondition: false,
      commentsCondition: false,

      //for the select option tag in Vue.js
      searchBy: "all",
      options: [
        { name: "Name", value: "name" },
        { name: "Country", value: "country" },
        { name: "Salary", value: "salary" },
        { name: "Comment", value: "comments" },
        { name: "All", value: "all" },
      ],

      //this is for pagination
      meta: [],
      offset: "",
      //this is for searching
      searchData: "",
    };
  },
  mounted() {
    this.loadComments();
  },
  methods: {
    addComment: function () {
      //console.log(document.querySelector("input")._value);
      //let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

      axios
        .post("comment", {
          name: this.name,
          country: this.country,
          salary: this.salary,
          comment: this.comment,
          //_token: token,
        })
        .then((response) => {
          this.loadComments();
          this.comment = "";
          this.name = "";
          this.country = "";
          this.salary = "";
          this.$toast.info("Data send to server !", {
            position: "top-right",
            timeout: 5000,
            closeOnClick: true,
            pauseOnFocusLoss: true,
            pauseOnHover: true,
            draggable: true,
            draggablePercent: 0.6,
            showCloseButtonOnHover: false,
            hideProgressBar: true,
            closeButton: "button",
            icon: true,
            rtl: false,
          });
          //alert("Thanks for submitting");
          //loadComments;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    //Pagination with the Comments Resource Object

    /*loadComments: function (page) {
      axios.get("api/comments", { params: { page } }).then((response) => {
        this.comments = response.data.data;
        this.meta = response.data.meta;
        // this.meta.push(response.data.current_page);
        //this.meta.push(response.data.last_page);
        // console.log(this.meta[1]);
      });
    },*/

    //Using get method in axios
    /*search: function () {
      if (this.searchData != "") {
        axios.get("search?name=" + this.searchData).then((response) => {
          //console.log(this.searchData);
          console.log(response);
          this.meta = [];
          this.meta[0] = 1;
          this.meta[1] = 1;
          //this.meta.push(response.data.current_page);
          //this.meta.push(response.data.last_page);
          this.comments = response.data.data;
        });
      } else {
        this.loadComments();
      }
    },*/

    //using the post method in axios
    //Pagination with the Json data
    loadComments: function (page) {
      axios.get("api/comments?page=" + page).then((response) => {
        // this.comments = response.data.data;
        this.comments = response.data.data;
        //this.meta = response.data.current_page;
        // this.meta.la = response.data.last_page;
        this.meta = [];
        this.meta.push(response.data.current_page);
        this.meta.push(response.data.last_page);
        //console.log(response);
        //console.log(this.meta[1] + " " + this.meta[0]);
        this.searchCondition = false;
        this.commentsCondition = true;
      });
    },

    //Searching here
    search: function (page) {
      if (this.searchData != "") {
        axios.post("api/comments/search?page=" + page, { name: this.searchData, searchBy: this.searchBy }).then((response) => {
          //console.log(this.searchData);
          //console.log(response.data);
          //console.log(page);
          this.meta = [];
          this.meta.push(response.data.current_page);
          this.meta.push(response.data.last_page);
          //this.meta.push(response.data.current_page);
          //this.meta.push(response.data.last_page);
          //console.log(response.data.current_page);
          //console.log(response.data.last_page);
          this.comments = response.data.data;
          this.searchCondition = true;
          this.commentsCondition = false;
          // this.searchBy="",
        });
      } else {
        console.log(this.searchData);
        this.loadComments();
      }
    },

    check: function () {
      if (this.searchData === "") {
        this.loadComments();
      } else {
        this.search();
      }
    },
  },
};
</script>
