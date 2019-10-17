<template>
    <div class="form-group" v-if="is_selected">
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
            this.selectedData.productId = this.row.id;
        },
        mounted(){
            this.checkProduct();
        },
        updated(){
            this.productDateTimeChange();
        },
        methods:{
            ...mapActions(['selectedProductDateTimeUpdate']),
            productDateTimeChange(){
                if(this.selectedData.date_time !== ''){
                    this.selectedProductDateTimeUpdate(this.selectedData)
                        .then(response=>{
                            Notify.success('Date Time Added & Selected');
                        })
                }
            },
            checkProduct(){
                for (let i=0; i< this.selectedProIds.length; i++){
                    if(this.selectedProIds[i] === this.row.id){
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
                        this.selectedProductDateTimeUpdate(this.selectedData)
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
