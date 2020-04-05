import Article from './Article'
import Index from './Index'
import Products from './pages/st_Products.vue'
import Orders from './pages/Orders.vue'
import Info from './pages/Info.vue'
import Band from './pages/Band.vue'
import Users from './pages/Users.vue'

export default [
    {
        path        :   '',
        component   :   Index,
        name        :   'index'
    },
    {
        path        :   '/article',
        component   :   Article,
        name        :   'article'
    },
    {
        path        :   '/products',
        component   :   Products,
        name        :   'products'
    },
    {
        path        :   '/orders',
        component   :   Orders,
        name        :   'orders'
    },
    {
        path        :   '/bandmembers',
        component   :   Band,
        name        :   'band'
    },
    {
        path        :   '/info',
        component   :   Info,
        name        :   'info'
    },
    {
        path        :   '/users',
        component   :   Users,
        name        :   'users'
    },
]