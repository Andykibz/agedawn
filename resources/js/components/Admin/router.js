import Article from './Article'
import Index from './Index'

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
    }
]