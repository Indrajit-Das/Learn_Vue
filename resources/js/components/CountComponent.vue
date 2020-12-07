<template>
  <div>
    <button v-on:click="count++">You clicked me now i'll count: {{ count }} times it's final.</button>
    <div class="nav">
      <router-link to="/second">Second</router-link>
      <router-link to="/third">Third</router-link>
    </div>
    <router-view></router-view>
  </div>
</template>
<script>
export default {
  data: function () {
    return {
      count: 0,
    };
  },
};
</script>
<style scoped>
a {
  padding: 0 10px;
}
.router-link-exact-active {
  color: indigo;
  background: khaki;
  opacity: 0.7;
}
</style>
