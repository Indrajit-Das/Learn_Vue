<template>
  <div>
    <cus></cus>
    <div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-sm-4">
          <!-- Router View Content  -->
          <router-view></router-view>
          <hr class="d-sm-none" />
        </div>
        <div class="col-sm-8">
          <!-- Router View Content  -->
          <div class="card">
            <div class="card-header">This Section is for Normal Content</div>
            <div class="card-body">
              This is the card Body. Where we can write whatever we want.Et laboris incididunt sunt ea consequat do fugiat mollit laboris est labore proident.VeliAliquip sint consectetur est elit irure commodo reprehenderit enim.Est anim in ea Lorem.Occaecat do consequat eu laboris ullamco et irure sint enim consequat
              sunt.t laboris eu Lorem pariatur enim pariatur sit eu eu eu enim magna aCillum labore eu culpa mollit laborum sunt dolore tempor et culpa eiusmod et pariatur.d non.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="jumbotron text-center foot">
      <p>Footer</p>
    </div>
  </div>
</template>
<script>
import cus from "../nav/TheNavigation.vue";

export default {
  components: {
    cus,
  },
};
</script>
<style scoped>
.foot {
  position: absolute;
  bottom: 0px;
  width: 100%;
  height: 20%;
  margin-bottom: 0;
}
</style>
