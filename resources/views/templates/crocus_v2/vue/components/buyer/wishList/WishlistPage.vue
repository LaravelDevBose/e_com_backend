<template>
    <div class="my-wishlist">
        <div class="table-responsive">
            <fieldset>
                <wish-list-products></wish-list-products>

                <div class="buttons-set buttons-set2">
                    <button class="button btn-add" @click.prevent="addAllToCart()" title="Add All to Cart" type="button"><span>Add All to Cart</span></button>
                </div>
            </fieldset>
        </div>
    </div>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';
    export default {
        name: "WishlistPage",
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
