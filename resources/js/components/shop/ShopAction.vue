<template>
    <ul class="icons-list">
        <li><a href="#" class="text text-primary" @click.prevent="goToShopDetails(row.seller_id)"><i class="icon-eye"></i></a></li>
        <li><a href="#" class="text text-danger" @click.prevent="deleteShop(row.seller_id)"><i class="icon-trash"></i></a></li>
    </ul>
</template>

<script>
    import {mapActions} from "vuex";
    export default {
        name: "ShopAction",
        methods: {
            ...mapActions([
                'shopDelete'
            ]),
            goToShopDetails: function(ID){
                window.location = `/admin/shop/${ID}`;
            },
            deleteShop(Id){
                let conf = confirm('Are You Sure Want To Delete.?');
                if(!conf){
                    return false;
                }
                this.shopDelete(Id)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            setTimeout( () =>{
                                location.reload();
                            }, 1500);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }

        },
    }
</script>

<style scoped>

</style>
