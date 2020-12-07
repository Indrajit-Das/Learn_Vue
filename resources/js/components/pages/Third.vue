<template>
  <div class="card">
    <div class="card-header">Named Route Section</div>
    <div class="card-body">
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
</template>
<script>
import Pagination from "../pages/Pagination2";

export default {
  data: function () {
    return {
      comments: {},
      loading: true,
      searchCondition: false,
      commentsCondition: false,
    };
  },
  mounted() {
    this.loadComments();
  },
  methods: {
    loadComments: function (page) {
      axios("api/comments?page=" + page).then((response) => {
        console.log(response);
        this.comments = response.data.data;
        this.meta = [];
        this.meta.push(response.data.current_page);
        this.meta.push(response.data.last_page);
        this.searchCondition = false;
        this.commentsCondition = true;
      });
    },
  },
};
</script>
<style scoped>
.card {
}
</style>
