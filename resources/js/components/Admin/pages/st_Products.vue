<template>
  <div class="row">
        <div class="col-md-7 col-12">
            <ProductsList/>
        </div>
        <div class="col-md-5 col-12 pr-1">
            
            <Categories/>
            <ProductsForm/>
        </div>
    </div>
</template>

<script>
import ProductsList from '../components/productlist'
import ProductsForm from '../components/productform'
import Categories from '../components/Categories'
export default {
    name    : 'Products',
    props   : [],
    components :{ ProductsForm, ProductsList, Categories },
    data(){
        return{

        }
    },
    methods : {

    },

}
</script>

<style scoped>

</style>