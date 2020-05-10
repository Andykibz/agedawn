<template>
    <div class="row mx-auto">
        <div class="col-lg-8 col-md-10 col-12">
            <div class="row">
                <div class="col-md-4 col-12 img-wrapper d-flex justify-content-center align-items-center" style="background-image:url(./imgs/weekly.jpg)">
                    <div class="overlay"></div>
                    <span class="date">
                        29<sup><sup>
                    </span>
                    <span class="">

                    </span>
                </div>
                <div class="col-md-8 col-12">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name    : "TopWeekly",
    // props   : ['top'],
    data(){
        return{
            top : {
                created_at  : '2020-05-03 08:45:59',
                body        : 'Dolores asperiores qui qui. Soluta consequatur maxime odio iure. Perspiciatis animi dolores recusand...	',
                headline    : 'Dolores asperiores qui qui. Soluta consequatur maxime odio iure. Perspiciatis animi dolores recusand...	',
                title       : 'sunt-nostrum-dignissimos',                
            }
        }
    },
    methods:{
        datify( date ){
            let d =  this.suffix( new Date('2020-05-03 08:45:59').getDate() )
            let month = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec' ][new Date(date).getUTCMonth()]
            let year = String( new Date(date).getUTCFullYear() ).replace('20',"'")
        },
        suffix( date ){
            let f = date
            switch (date) {
                case [1,21,31].includes(date):
                    f = f+'<sup>st</sup>';
                    break;

                case [2,22].includes(date):
                    f = f+'<sup>nd</sup>';
                    break;
                
                case [3,23].includes(date):
                    f = f+'<sup>rd</sup>';
                    break;

                default:
                    f = f+'<sup>th</sup>';
                    break;
            }
            return f;
        }
    }
}
</script>

<style scoped>
    .img-wrapper{
        min-height: 200px;
        background-origin: content-box;
        background-position: center;
        background-size: cover;
    }
    .img-wrapper .overlay{
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: .4;
    }
</style>