import Index from './pages/Index'
import Store from './pages/Store'
import Media from './pages/Media'
import About from './pages/About'
import News from './pages/News'
import Product from './pages/ProductItem.vue'
import NewsItem from './pages/NewsItem.vue'
export default [
    {
        path        :   '/',
        component   :   Index,
        name        :   'home'
    },
    {
        path        :   '/about-us',
        component   :   About,
        name        :   'about'
    },
    {
        path        :   '/news',
        component   :   News,
        name        :   'news'
    },
    {
        path        :   '/new/:id',
        component   :   NewsItem,
        name        :   'newsitem'
    },
    {
        path        :   '/store',
        component   :   Store,
        name        :   'store'
    },
    {
        path        :   '/media',
        component   :   Media,
        name        :   'media'
    },
    {
        path        :   '/product/:id',
        component   :   Product,
        name        :   'product'
    },

]