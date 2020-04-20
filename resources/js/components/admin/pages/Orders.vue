<template>
      <div>
        <div class="d-flex flex-row justify-content-around ">
            <h3>Orders</h3>
            <small class="d-flex align-items-center"> {{ current_page }} of {{ last_page }} </small>
        </div>

        <div id="artcile-list" class="mb-1 d-flex justify-content-center row">
            <div v-for="order in orders" :key="order.id" class=" position-relative col-lg-4 col-md-6 col-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="my-0 font-weight-normal d-flex flex-column justify-content-between"> 
                            <div v-text="order.name" class="mb-1"></div>
                            <small class="text-muted mb-1" v-text="order.email"></small>
                            <small class="text-muted mb-1" v-text="order.phone"></small>
                        </h5>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title pricing-card-title"><small class="text-muted">KES</small> {{ order.invoice }} </h4>
                        <ul class="list-unstyled mt-3 mb-4">

                            <li v-for="product in order.products" :key="product.id">
                                {{ product.name }}  :   {{ product.pivot.product_count }}
                            </li>
                            
                        </ul>
    
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>

        </div>
        </div>

        <paginate :prevpage="prevpage" :nextpage="nextpage" />
    </div>
</template>

<script>
import paginate from '../components/sub/paginate'
export default {
    name        :   'Orders',
    components  :   { paginate },
    data(){
        return{
            orders : [],
            current_page    :   '',
            nextlink        :   '',
            prevlink        :   '',
            last_page       :   ''
        }
    },
    methods:{
        prevpage(){
            this.getOrders(this.prevlink)
        },
        nextpage(){
            this.getOrders(this.nextlink)
        },
        getOrders( link = '/api/admin/orders' ){
            axios.get( link )
            .then((response)=>{
                this.current_page   =   response.data.meta.current_page
                this.orders         =   response.data.data  
                this.nextlink       =   response.data.links.next_page_url,
                this.prevlink       =   response.data.links.prev_page_url
                this.last_page      =   response.data.meta.last_page
            }).catch( (err) => console.log(err.response.data) )
        },
        created_date( date ){
            let months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec' ]
            let month   = months[new Date(date).getUTCMonth()]
            let year    = String( new Date(date).getUTCFullYear() ).replace('20',"'")
            return `${month} ${new Date(date).getUTCDate()} ${year}`
        },
        
    },
    mounted(){
        this.getOrders()
    }
}
</script>

<style>

</style>