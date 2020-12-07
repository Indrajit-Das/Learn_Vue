<template>
  <div>
    <ul class="pagination">
      <li class="page-item" :class="{ disabled: meta.current_page === 1 }"><a class="page-link" href="#" @click.prevent="changePage(meta.current_page - 1)">Previous</a></li>
      <li class="page-item" v-for="page in meta.last_page">
        <a class="page-link" :class="{ active: meta.current_page === page }" href="#" @click.prevent="changePage(page)">{{ page }}</a>
      </li>
      <li class="page-item" :class="{ disabled: meta.current_page === meta.last_page }"><a class="page-link" href="#" @click.prevent="changePage(meta.current_page + 1)">Next</a></li>
    </ul>
  </div>
</template>
<script>
export default {
  props: ["meta"],
  data() {
    return {};
  },
  methods: {
    changePage: function (page) {
      // console.log(page);
      this.$emit("pagination", page);
    },
    /*computed: {
      pages() {
        let pages = [];
        let from = this.pagination.current_page - Math.floor(this.offset / 2);
        if (from < 1) {
          from = 1;
        }
        let to = from + this.offset - 1;
        if (to > this.pagination.last_page) {
          to = this.pagination.last_page;
        }
        while (from <= to) {
          pages.push(from);
          from++;
        }
        return pages;
      },
    },*/
  },
};
</script>
