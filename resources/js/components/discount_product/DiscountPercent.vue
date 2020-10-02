<template>
    <div class="form-group" v-if="is_selected">
        <input type="number" step="0.0" v-model="selectedData.percent" class="form-control" required>
    </div>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';

    export default {
        name: "DiscountPercent",
        props:['productId'],
        data(){
            return{
                check:false,
                is_selected:false,
                selectedData:{
                    productId:'',
                    percent:'',
                    type:'add',
                }
            }
        },
        created(){
            this.selectedData.productId = this.productId;
        },
        mounted(){
            this.checkProduct();
        },
        updated(){
            this.productDateTimeChange();
        },
        methods:{
            ...mapActions(['discountPercentUpdate']),
            productDateTimeChange(){
                if(this.selectedData.percent !== ''){
                    this.discountPercentUpdate(this.selectedData);
                }
            },
            checkProduct(){
                for (let i=0; i< this.selectedProIds.length; i++){
                    if(this.selectedProIds[i] === this.productId){
                        this.check = true;
                        break;
                    }
                }
                if(this.check){
                    this.is_selected = true;
                }else{
                    this.is_selected = false;
                    if(this.selectedData.percent !== ''){
                        this.selectedData.type = 'remove';
                        this.discountPercentUpdate(this.selectedData)
                            .then(response=>{
                                Notify.warning('Date Time Removed');
                                this.selectedData.type = 'add';
                                this.selectedData.percent = '';
                            })
                    }

                }
                this.check = false;
            }
        },
        computed:{
            ...mapGetters([
                'selectedProIds'
            ]),
            productIdsDataCheck(){
                return JSON.parse(JSON.stringify(this.selectedProIds));
            }
        },
        watch:{
            productIdsDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        setTimeout(()=>{
                            this.checkProduct();
                        },500)

                    }

                }
            }
        }
    }
</script>

<style scoped>

</style>
