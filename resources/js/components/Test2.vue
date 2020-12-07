<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title" v-on:click="seen = !seen">{{ title }}</h5>
      <p class="card-text" v-bind:title="dt">{{ content }}</p>
      <ol>
        <li v-for="lop in lp" v-if="seen" v-on:click="alt(lop.text)">{{ lop.text }}</li>
      </ol>
    </div>
    <input type="text" v-model="c" />
    <div>
      <p v-on:click="addD">(+)</p>
      <span v-on:click="delD">(-)</span>
    </div>
    <div class="static" :style="{ 'text-decoration': decoration }">Demo Class</div>
    <router-view></router-view>
  </div>
</template>
<script>
let data = {
  c: "random",
};

export default {
  data: function () {
    return {
      title: "Card Title",
      content: "This is Card content",
      seen: true,
      dt: new Date().toLocaleString(),
      c: data.c,

      decoration: "underline",

      isActive: false,
      hasError: true,

      lp: [{ text: "hello" }, { text: "Indrajit" }, { text: "engineer" }, { text: "doctor" }],
    };
  },
  methods: {
    alt: function (index) {
      alert("vanish " + index);
      $("li").css("background", "green");
    },
    addD: function () {
      if (this.c != "") {
        this.lp.push({ text: this.c });
      }
    },
    delD: function () {
      this.lp.pop();
    },
  },
};
</script>
