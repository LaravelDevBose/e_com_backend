<template>
    <div class="input-group" v-show="is_selected" style="max-width:15rem">
        <datetime
            type="datetime"
            use12-hour
            v-model="selectedData.date_time"
            input-id="startDate"
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
        name: "ProductGroupExpired",
        props:['row'],
        data(){
            return{
                is_selected:false,
                selectedData:{
                    productId:'',
                    date_time:'',
                    type:'add',
                }
            }
        },
        /*mounted(){
            this.checkProduct();
        },*/
        updated(){
            this.productDateTimeChange();
        },
        methods:{
            ...mapActions(['selectedProductDateTimeUpdate']),
            productDateTimeChange(){
                this.selectedData.productId = this.row.id;
                if(this.selectedData.date_time !== ''){
                    this.selectedProductDateTimeUpdate(this.selectedData)
                        .then(response=>{
                            Notify.success('Date Time Added & Selected');
                        })
                }
            },
            checkProduct(){
                this.selectedProIds.filter(productId =>{
                    if(productId === this.row.id){
                        this.is_selected = true;
                    }else if(productId !== this.row.id){
                        this.is_selected = false;
                        this.selectedData.type = 'remove';
                        this.selectedProductDateTimeUpdate(this.selectedData)
                            .then(response=>{
                                this.selectedData.data_time ='';
                                this.selectedData.type = 'add';
                                Notify.warning('Date Time Remove & Unselected');
                            })
                    }else{
                        this.is_selected = false;
                    }
                })
            },
        },
        computed:{
            ...mapGetters([
                'selectedProIds'
            ]),
            productIdsDataCheck(){
                return JSON.parse(JSON.stringify(this.selectedProIds));
            },
            /*selectedDataCheck(){
                return JSON.parse(JSON.stringify(this.selectedData));
            },*/
        },
        watch:{
            productIdsDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        setTimeout(()=>{
                            this.checkProduct();
                        },200)

                    }

                }
            },
            /*selectedDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        console.log(this.selectedData);
                        this.productDateTimeChange();
                    }

                }
            }*/
        }

    }
</script>

<style scoped>

</style>
