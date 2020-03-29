<template>
    <div class="row">
        
        <legend> Product Details </legend>
        <div class="col-12">
          <div v-for="(value,name) in errors" :key="name" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ name }}</strong> {{ value[0] }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="col-12">
            <label for="">Product Name</label>
            <input type="text" name="name" class="form-control mb-3" 
                  placeholder="Product Name" v-model="product.name">
        </div>
                
        <div class="col-12">
          <label for="">SKU Number</label>
          <input type="text" name="sku_num" class="form-control mb-3" 
                placeholder="SKU Number" v-model="product.sku_num">
        </div>
  
        <div class="col-12">
            <label for="">Product Quantity</label>
            <input type="number" name="quantity" class="form-control mb-3" min="0"
                  placeholder="Quantity in Stock" v-model="product.quantity">
        </div>

        <div class="col-12">
          <label for="">Category</label>
          <select class="custom-select mb-3" v-model="product.category_id">
                <option  v-for="category in categories" :key="category.id" :value="category.id" >{{ category.name }} </option>
                <!-- </div> -->

          </select>
        </div>
          
        <div class="col-12">
            <label> Product Image </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <div class="image-wrapper">
                    <img ref="file" :src="product.image" class="img-fluid img-thumbnail"/>
                </div>
                <input @change="changelabel($event)" type="file" class="custom-file-input" id="product-image"
                  aria-describedby="product-image">
                <label id="custom-file-label" class="custom-file-label" for="product-image">Choose File</label>
              </div>
            </div>
        </div>

        <div class="col-12">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control mb-3" min="0"
                  placeholder="Price in Kes" v-model="product.price">
        </div>
  
        <div class="col-12">
            <label for="">Product Description</label>
            <textarea name="description" class="form-control mb-3" rows="5"
                      placeholder="Description" v-model="product.description"></textarea>
        </div>

        <div class="col-12">
            <Button @click="saveProduct" class="btn btn-outline-dark">Submit</Button>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import products from '../store/modules/products';
import { log } from 'util';
export default {

    name  : "ProductForm",
    props : [],
    data(){
      return{
        selectedFile    : null,
        errors          : null,
      }
    },
    computed:{
        ...mapGetters({
          product : 'products/getProduct',
          categories : 'products/getCategories'
        }),
        
    },
    methods:{
        changelabel(event){
            let filename = event.target.value.split('\\').pop()
            document.getElementById('custom-file-label').textContent = filename
            this.selectedFile = event.target.files[0]
        },

        ...mapActions({
              queryCategoriesAction : 'products/queryCategories',
              queryProductsAction   : 'products/queryProducts',
              saveProductAction     : 'products/saveProduct',
              resetProductAction    : 'products/resetProduct',
        }),

        saveProduct(){
            self = this           
            let productForm = new FormData();
            productForm.set('id',this.product.id)
            productForm.set('name',this.product.name)
            productForm.set('sku_num',this.product.sku_num)
            productForm.set('quantity',this.product.quantity)
            productForm.set('category_id',this.product.category_id)
            productForm.set('price',this.product.price)
            productForm.append('description',this.product.description)
            // productForm.append('image', this.selectedFile || '', this.selectedFile.name || '')
            productForm.append('image', this.selectedFile || null )
            // console.log(productForm);
            
            self.saveProductAction(productForm)
            .then(function (response) {
                    //handle success
                    self.resetProductAction()
                    self.queryProductsAction()
                    self.selectedFile = null
                    document.getElementById('custom-file-label').textContent = "Choose File"
                })
                .catch(function (err) {
                    //handle error
                    self.errors = err.response.data.errors
                    console.log(err.response.data);
                });

        }
        // previewImage(event){
        //     let reader = new FileReader();
        //     reader.onload = function (e) {
        //         document.getElementById()
        //         $('#blah').attr('src', e.target.result);
        //     }
        //     reader.readAsDataURL(event.target.files[0]);
        //     // console.log(event.target.files);
        // }
    },
    created(){
      this.queryCategoriesAction()
    }
}
</script>

<style>

</style>