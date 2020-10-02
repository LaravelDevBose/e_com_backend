<template>
    <ul class="icons-list">
<!--        <li><a href="#" class="text text-info" @click.prevent="goToEditPage(row.id)"><i class="icon-pencil7"></i></a></li>-->
        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.group_id)"><i class="icon-trash"></i></a></li>
    </ul>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "DiscountProductAction",
        props:['row'],
        methods:{
            ...mapActions([
                'deleteDiscountProduct'
            ]),
            showDeletePopUp(groupId){
                let conf = confirm('Are You Sure.?'+groupId);
                if(conf){
                    this.deleteDiscountProduct(groupId)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                Notify.success(response.messages);
                            }else{
                                Notify.error(response.messages);
                            }
                        });
                }
                return false;
            }
        }
    }
</script>

<style scoped>

</style>
