<template>
    <div class="btn-group">
        <span  class="label  dropdown-toggle"
               :class="{'bg-success':row.status === 1, 'bg-info':row.status === 2, 'bg-warning':row.status === 3, 'bg-primary':row.status === 4, 'bg-indigo-400':row.status === 5, 'bg-teal':row.status === 6 }"
               data-toggle="dropdown" aria-expanded="false">
            {{ row.status_label }}
            <span class="caret"></span>
        </span>
        <div >
            <ul v-if="productStatus" class="dropdown-menu dropdown-menu-right">
                <li v-for="(statusName, index) in productStatus" v-if="row.status !== index">
                    <a href="#" @click.prevent="changeProductStatus(row.id, index)">
                        <span
                            class="status-mark position-left"
                            :class="{'bg-success':index === 1, 'bg-info':index === 2, 'bg-warning':index === 3, 'bg-primary':index === 4, 'bg-indigo-400':index === 5, 'bg-teal':index === 6 }"
                        ></span> {{ statusName }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "ProductStatus",
        props: ['row'],
        methods:{
            ...mapActions([
                'productStatusChange'
            ]),
            changeProductStatus(productId, status){
                let reqData={
                    product_id:productId,
                    product_status:status,
                }
                this.productStatusChange(reqData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'productStatus'
            ])
        }
    }
</script>

<style scoped>

</style>
