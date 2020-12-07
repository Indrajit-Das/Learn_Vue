<template>
  <div>
    <div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">Student Entry Here</div>
            <div class="card-body">
              <div>
                <p>Typing: {{ name }} / {{ school_name }} / {{ in_class }} / {{ roll }} / {{ position }} / {{ age }} /{{ religion }}</p>
                <input v-model="name" type="text" placeholder="Student Name " class="form-control mt-1" />
                <input v-model="school_name" type="text" placeholder="School Name" class="form-control mt-1" />
                <input v-model="in_class" type="text" placeholder="Class" class="form-control mt-1" />
                <input v-model="roll" type="text" placeholder="Class Roll" class="form-control mt-1" />
                <input v-model="position" type="text" placeholder="Class Position" class="form-control mt-1" />
                <input v-model="age" type="text" placeholder="Age" class="form-control mt-1" />
                <input v-model="religion" type="text" placeholder="Religion " class="form-control" />
                <input type="button" @click="saveStudent" class="btn btn-sm btn-info mt-4" value="Save" />
              </div>
            </div>
          </div>
          <hr class="d-sm-none" />
        </div>
        <div class="col-sm-8">
          <!-- Router View Content  -->
          <div class="card">
            <div class="card-header">This Section is for Student Content</div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <!--<b-form-select class="form-control col-8" v-model="perPage" :options="optionsPerPage" text-field="name" value-field="value" @change="loadStudents"> </b-form-select>-->
                  <select v-model="pageSize" @change="handlePageSizeChange($event)">
                    <option v-for="size in pageSizes" :key="size" :value="size">
                      {{ size }}
                    </option>
                  </select>
                </div>
                <div class="form-group col-4">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Search By :</span>
                    </div>
                    <b-form-select class="form-control col-8" v-model="searchBy" :options="options" text-field="name" value-field="value"> </b-form-select>
                  </div>
                </div>
                <div class="form-group col-4">
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
                    <th>School</th>
                    <th>Class</th>
                    <th>Roll</th>
                    <th>Position</th>
                    <th>Age</th>
                    <th>Religion</th>
                  </thead>
                  <tbody class="text-center">
                    <tr v-for="(com, index) in students">
                      <td>{{ index + 1 }}</td>
                      <td>{{ com.name }}</td>
                      <td>{{ com.school }}</td>
                      <td>{{ com.in_class }}</td>
                      <td>{{ com.roll }}</td>
                      <td>{{ com.position }}</td>
                      <td>{{ com.age }}</td>
                      <td>{{ com.religion }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <span> <pagination :meta="meta" :offset="5" v-if="commentsCondition" v-on:pagination="loadStudents"></pagination></span>
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
import Pagination from ".././pages/Pagination2";
export default {
  components: { Pagination },
  data: function () {
    return {
      name: "",
      school_name: "",
      in_class: "",
      roll: "",
      position: "",
      age: "",
      religion: "",
      students: {},
      loading: true,
      searchCondition: false,
      commentsCondition: false,

      //for the select option tag in Vue.js
      searchBy: "all",
      options: [
        { name: "Name", value: "name" },
        { name: "School", value: "school" },
        { name: "Class", value: "in_class" },
        { name: "Roll", value: "roll" },
        { name: "Position", value: "position" },
        { name: "Age", value: "age" },
        { name: "Religion", value: "religion" },

        { name: "All", value: "all" },
      ],
      pageSize: 20,
      pageSizes: [10, 20, 40, 50, 100, 200, 400, 500, 1000, 2000, 3000, 5000],

      //this is for pagination
      meta: [],
      offset: "",
      //this is for searching
      searchData: "",
    };
  },
  mounted() {
    this.loadStudents();
  },
  methods: {
    saveStudent: function () {
      axios
        .post("api/student", {
          name: this.name,
          school: this.school_name,
          in_class: this.in_class,
          roll: this.roll,
          position: this.position,
          age: this.age,
          religion: this.religion,
        })
        .then((response) => {
          //console.log(response.data);
          (this.name = ""),
            (this.school = ""),
            (this.in_class = ""),
            (this.roll = ""),
            (this.position = ""),
            (this.age = ""),
            (this.relogion = ""),
            this.$toast.info("Student Saved to the server !", {
              position: "top-right",
              timeout: 3000,
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
        });
    },
    loadStudents: function (page) {
      axios.post("api/student?page=" + page, { perPage: this.pageSize }).then((response) => {
        this.students = response.data.data;
        //console.log(response.data.data);
        this.meta = [];
        this.meta.push(response.data.current_page);
        this.meta.push(response.data.last_page);
        this.searchCondition = false;
        this.commentsCondition = true;
      });
    },

    //Searching here
    search: function (page) {
      if (this.searchData != "") {
        //console.log("pressed");
        axios.post("api/student/search?page=" + page, { name: this.searchData, searchBy: this.searchBy }).then((response) => {
          console.log(response);
          this.meta = [];
          this.meta.push(response.data.current_page);
          this.meta.push(response.data.last_page);
          this.students = response.data.data;
          this.searchCondition = true;
          this.commentsCondition = false;
        });
      } else {
        console.log(this.searchData);
        this.loadStudents();
      }
    },
    check: function () {
      if (this.searchData === "") {
        this.loadStudents();
      } else {
        this.search();
      }
    },
    handlePageSizeChange(event) {
      this.pageSize = event.target.value;
      //this.page = 1;
      this.loadStudents();
    },
  },
};
</script>
