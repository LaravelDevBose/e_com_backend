<template>
    <input type="checkbox" class="checkbox" value="1" v-model="status" @change="updateProductIds">
</template>

<script>
    import {mapActions,mapGetters} from 'vuex';
    import _ from 'lodash';

    export default {
        name: "ProductCheckbox",
        props: ['row'],
        data(){
            return{
                status:false,
                selectData:{
                    productId:'',
                    type:'add'
                }
            }
        },
        mounted(){
            this.checkProduct();
        },
        methods:{
            ...mapActions(['selectedProductIdUpdate']),
            updateProductIds(){
                this.selectData.productId = this.row.id;
                if(this.status === false){
                    this.selectData.type = 'remove';
                }
                this.selectedProductIdUpdate(this.selectData)
                    .then(response=>{
                        if(this.status === false){
                            Notify.success('Product Remove.');
                        }else{
                            Notify.success('Product Add.');
                        }

                    })
            },
            checkProduct(){
                this.selectedProIds.filter(productId =>{
                    if(productId === this.row.id){
                        this.status = true;
                    }
                })
            }
        },
        computed:{
            ...mapGetters([
                'selectedProIds'
            ]),

        },
        /*watch:{
            status:function () {
                this.updateProductIds();
            }
        }*/
    }
</script>

<style scoped>

</style>
