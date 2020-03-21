<template>
  <div class="sidebar-filter">
    <div class="top-filter-head">Filtros</div>
    <div class="common-filter">
      <div class="head">Color</div>
      <form action="#">
        <ul>
          <li class="filter-list" v-for="color in colors">
            <input class="pixel-radio" type="radio" name="color_id" :value="color.id" @click="getColor(color.id)">
            <label>{{color.name | capitalize}}<span> ({{color.products_count}})</span>
            </label>
          </li>
        </ul>
      </form>
    </div>
  </div>
</template>
<script>
  import {mapActions, mapMutations, mapState} from 'vuex'
  export default {
    mounted() {
      this.fetchColors()
    },
    data() {
      return {
      }
    },
    props: {

    }, 
    methods: {
      ...mapActions('color', ['fetchColors']),
      ...mapActions('product', ['searchProducts']),
      ...mapMutations('filter', ['setColor']),
      getColor(id){
        this.setColor(id)
        this.searchProducts( [this.selectedQuery, this.selectedCategory, this.selectedColor])
      }
    },
    computed: {
      ...mapState('color', ['colors']),
      ...mapState('product', ['products']),
      ...mapState('filter', ['selectedCategory', 'selectedColor', 'selectedQuery']),
    },
    filters: {
      capitalize: function (value) {
        if (!value) return ''
        value = value.toString()
        return value.charAt(0).toUpperCase() + value.slice(1)
      }
    }
  };
</script>