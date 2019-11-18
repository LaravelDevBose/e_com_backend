<template>
    <div class="content-text clearfix">
        <wish-list-products></wish-list-products>
        <div class="text-right">
            <button type="button" @click.prevent="addAllToCart()" title="Add All to Cart" class="btn btn-primary btn-sm">
                <span>Add All to Cart</span>
            </button>
        </div>

    </div>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';
    import WishListProducts from "./WishListProducts";
    export default {
        name: "WishlistPage",
        components:{WishListProducts},
        data(){
            return{

            }
        },
        methods:{
            ...mapActions([
                'addAllWListItemsToCart',
                'getCartDetails',
            ]),
            addAllToCart(){
                this.addAllWListItemsToCart()
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                            if(response.hasOwnProperty('url')){
                                setTimeout(()=>{
                                    location.href = response.url;
                                },1200)
                            }else{
                                this.getCartDetails();
                            }

                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([

            ])
        }

    }
</script>

<style scoped>

</style>
