<template>
  <div class="container">
    <ul class="pagination pagination-md flex-wrap">
      <li class="page-item" :class="{ disabled: meta[0] === 1 }"><a class="page-link" href="#" @click.prevent="changePage(1)">First</a></li>

      <li class="page-item" :class="{ disabled: meta[0] === 1 }"><a class="page-link" href="#" @click.prevent="changePage(meta[0] - 1)">Previous</a></li>
      <li class="page-item" :class="{ active: meta[0] === page }" v-for="page in pages">
        <a class="page-link" href="#" @click.prevent="changePage(page)">{{ page }}</a>
      </li>
      <li class="page-item" :class="{ disabled: meta[0] === meta[1] }"><a class="page-link" href="#" @click.prevent="changePage(meta[0] + 1)">Next</a></li>

      <li class="page-item" :class="{ disabled: meta[0] === meta[1] }"><a class="page-link" href="#" @click.prevent="changePage(meta[1])">Last</a></li>
    </ul>
  </div>
</template>
<script>
export default {
  props: ["meta", "offset"],

  data() {
    return {
      //current_page: this.meta[0],
      //last_page: this.meta[1],
    };
  },
  methods: {
    changePage: function (page) {
      //console.log(page);

      this.$emit("pagination", page);
    },
  },

  computed: {
    pages() {
      let pages = [];
      let from = this.meta[0] - Math.floor(this.offset / 2);
      if (from < 1) {
        from = 1;
      }
      let to = from + this.offset - 1;
      if (to > this.meta[1]) {
        to = this.meta[1];
      }
      while (from <= to) {
        pages.push(from);
        from++;
      }
      return pages;
    },
  },
};
</script>
