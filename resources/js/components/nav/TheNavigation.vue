<template>
  <div>
    <b-nav pills>
      <b-nav-item to="/" exact>Active</b-nav-item>
      <b-nav-item to="/second">Second</b-nav-item>
      <b-nav-item to="/third">Third</b-nav-item>
      <b-nav-item to="/add">ADD Comment</b-nav-item>
      <b-nav-item to="/student">Student</b-nav-item>
      <b-nav-item to="/customer">Customer</b-nav-item>
      <b-nav-item to="/school">School</b-nav-item>
      <b-nav-item to="/hospital">Hospital</b-nav-item>
      <b-nav-item to="/hotel">Hotel</b-nav-item>
    </b-nav>
  </div>
</template>
<style>
.router-link-active {
  background: indigo;
  opacity: 0.7;
}
</style>
