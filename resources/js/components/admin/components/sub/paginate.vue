<template>
    <nav aria-label="Page navigation example d-flex justify-content-center">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous" @click.prevent="prevpage">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- <li class="page-item" v-for="(n,index) in last_page-1" :key="index">
                <a class="page-link" href="#">{{ n }}</a>
            </li> -->
            <li>
                <a  class="page-link" href="#" aria-label="Next" @click.prevent="nextpage">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    props: {
        nextpage: {
            type: Function
        },
        prevpage: {
            type: Function
        }
    }
}
</script>