import Article from './Article'
import Index from './Index'
import Products from './pages/st_Products.vue'
import Orders from './pages/Orders.vue'
import Info from './pages/Info.vue'
import Band from './pages/Band.vue'
import Users from './pages/Users.vue'

export default [
    {
        path        :   '/admin',
        component   :   Index,
        name        :   'index'
    },
    {
        path        :   '/admin/article',
        component   :   Article,
        name        :   'article'
    },
    {
        path        :   '/admin/products',
        component   :   Products,
        name        :   'products'
    },
    {
        path        :   '/admin/orders',
        component   :   Orders,
        name        :   'orders'
    },
    {
        path        :   '/admin/bandmembere',
        component   :   Band,
        name        :   'band'
    },
    {
        path        :   '/admin/info',
        component   :   Info,
        name        :   'info'
    },
    {
        path        :   '/admin/users',
        component   :   Users,
        name        :   'users'
    },
]