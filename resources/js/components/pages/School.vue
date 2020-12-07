<template>
  <div>
    <div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">Comment Here</div>
            <div class="card-body">
              <div>
                <p>Typing: {{ name }} / {{ school }} / {{ in_class }} / {{ role }} / {{ position }} / {{ age }} /{{ religion }}</p>
                <input v-model="name" type="text" placeholder="Student Name " class="form-control mt-1" />
                <input v-model="school" type="text" placeholder="School Name" class="form-control mt-1" />
                <input v-model="in_class" type="text" placeholder="Class" class="form-control mt-1" />
                <input v-model="role" type="text" placeholder="Class Role" class="form-control mt-1" />
                <input v-model="position" type="text" placeholder="Class Position" class="form-control mt-1" />
                <input v-model="age" type="text" placeholder="Age" class="form-control mt-1" />
                <input v-model="religion" type="text" placeholder="Religion " class="form-control" />
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
                    <th>School</th>
                    <th>Class</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Age</th>
                    <th>Religion</th>
                  </thead>
                  <tbody class="text-center">
                    <tr v-for="(com, index) in comments">
                      <td>{{ index + 1 }}</td>
                      <td>{{ com.name }}</td>
                      <td>{{ com.school }}</td>
                      <td>{{ com.in_class }}</td>
                      <td>{{ com.role }}</td>
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
import Pagination from ".././pages/Pagination2";
export default {
  components: { Pagination },
  data: function () {
    return {
      name: "",
      school: "",
      in_class: "",
      role: "",
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
        { name: "Class", value: "class_name" },
        { name: "Role", value: "role" },
        { name: "Position", value: "position" },
        { name: "Religion", value: "religion" },
        { name: "Age", value: "age" },
        { name: "All", value: "all" },
      ],

      //this is for pagination
      meta: [],
      offset: "",
      //this is for searching
      searchData: "",
    };
  },
};
</script>
