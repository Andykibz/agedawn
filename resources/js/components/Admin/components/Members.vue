<template>  
<div class="row">
    <div class="col-md-7 col-12">
        <MembersList/>
    </div>
    <div class="col-md-5 col-12 ">
        <MembersForm/>
    </div>
</div>
  
</template>

<script>
import MembersForm from './sub/MembersForm'
import MembersList from './sub/MembersList'
export default {
    name    : 'BandMembers',
    props   : [],
    components :{ MembersForm, MembersList },
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


