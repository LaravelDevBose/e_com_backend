<template>
    <div class="form-group" v-if="is_selected">
        <datetime
            type="date"
            use12-hour
            v-model="selectedData.date_time"
            input-id="expireDate"
            input-class="form-control"
            :phrases="{ok: 'Continue', cancel: 'Exit'}"
            :week-start="6"
        >
        </datetime>
    </div>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';

    export default {
        name: "DiscountProductExpired",
        props:['productId'],
        data(){
            return{
                check:false,
                is_selected:false,
                selectedData:{
                    productId:'',
                    date_time:'',
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
            ...mapActions(['expireAtUpdate']),
            productDateTimeChange(){
                if(this.selectedData.date_time !== ''){
                    this.expireAtUpdate(this.selectedData)
                        .then(response=>{
                            Notify.success('Date Time Added & Selected');
                        })
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
                    if(this.selectedData.date_time !== ''){
                        this.selectedData.type = 'remove';
                        this.expireAtUpdate(this.selectedData)
                            .then(response=>{
                                Notify.warning('Date Time Removed');
                                this.selectedData.type = 'add';
                                this.selectedData.date_time = '';
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
