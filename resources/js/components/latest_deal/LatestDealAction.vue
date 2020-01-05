<template>
    <ul class="icons-list">
        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.id)"><i class="icon-trash"></i></a></li>
    </ul>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "LatestDealAction",
        props:['row'],
        methods:{
            ...mapActions([
                'deleteLatestDealProduct'
            ]),
            showDeletePopUp(dealId){
                let conf = confirm('Are You Sure.?');
                if(!conf){
                    return false;
                }
                this.deleteLatestDealProduct(dealId)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.messages);
                        }else{
                            Notify.error(response.messages);
                        }
                    });
            }
        }
    }
</script>

<style scoped>

</style>
