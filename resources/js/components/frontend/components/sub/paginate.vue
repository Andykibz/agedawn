<template>
    <div class="wrapper">
        <ul class="pagination">
            <li v-for="n in last" :key="n" @click.prevent="getPage(n)"  class="pagination__item " ><a href="#" :class="{ 'is_active' : n==current}" class="pagination__link">1</a></li>
            <!-- <li @click="paginateClick" class="pagination__item"><a href="#" class="pagination__link is_active">2</a></li>
            <li @click="paginateClick" class="pagination__item"><a href="#" class="pagination__link">3</a></li>
            <li @click="paginateClick" class="pagination__item"><a href="#" class="pagination__link">4</a></li>
            <li @click="paginateClick" class="pagination__item"><a href="#" class="pagination__link">5</a></li>
            <li @click="paginateClick" class="pagination__item"><a href="#" class="pagination__link">6</a></li> -->
        </ul>
    </div>
</template>

<script>
export default {
    name    : "Pagination",
    props   : { 
        last: Number,
        current: Number,
        getPage : Function,
        
    },
    methods:{
        paginateClick(){
            document.getElementsByClassName("is_active")[0].classList.remove('is_active');
            event.target.classList.add('is_active')
        },
    },
    mounted(){
        console.log(this.current);
        
    }
}
</script>

<style lang="scss">

a {
  text-decoration: none;
  
}
.wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
}

.pagination {
  
  &__item {
    display: inline-block;
    margin: 0 10px;
  }
  
  &__link {
    position: relative;
    text-indent: -99em;
    overflow: hiddin;
    display:block;
    width: 24px;
    height: 24px;
    
    &:before,
    &:after {
      content: '';
      display:block;
      position: absolute;
      top: 0;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 3px solid #eef;
      transition: all 600ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    
    &:before {
      background: #eef;
      transform: scale(.2);
    }
    &:after {
      
    }
    &:hover {
      &:after {
        transform: scale(1.1);
      }
    }
    &.is_active {
      &:before {
        transform: scale(.5);
      }
      &:after {
        transform: scale(.2);
      }
    }
  }
}

</style>