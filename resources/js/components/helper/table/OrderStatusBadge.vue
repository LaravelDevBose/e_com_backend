<template>
    <div class="btn-group">
        <span  class="label  dropdown-toggle"
               :class="{'bg-info':row.order_status == 1, 'bg-danger':row.order_status == 2, 'bg-warning':row.order_status == 3, 'bg-primary':row.order_status == 4, 'bg-indigo-400':row.order_status == 5, 'bg-teal':row.order_status == 6 }"
               data-toggle="dropdown" aria-expanded="false">
            {{ row.status_label }}
            <span v-if="row.order_status != 2  && row.order_status != 6" class="caret"></span>
        </span>
        <div v-if="row.order_status != 2 && row.order_status != 6" >
            <ul v-if="statusList" class="dropdown-menu dropdown-menu-right">
                <li v-for="(status, index) in statusList" v-if="row.order_status != index">
                    <a href="#" @click.prevent="changeOrderStatus(row.order_no, index)">
                        <span
                            class="status-mark position-left"
                            :class="{'bg-info':index == 1, 'bg-danger':index == 2, 'bg-warning':index == 3, 'bg-primary':index == 4, 'bg-indigo-400':index == 5, 'bg-teal':index == 6 }"
                        ></span> {{ status }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import {mapActions,mapGetters} from 'vuex';
    export default {
        name: "OrderStatusBadge",
        props: ['row'],
        methods:{
            ...mapActions([
                'orderStatusChange'
            ]),
            changeOrderStatus(orderNo, status){
                //TODO use nice Global Modal For Confirm Action

                let conf = confirm('Are You Sure Want To change Order Status.?');
                if(!conf){
                    return false;
                }
                this.orderStatusChange({order_no:orderNo, status:status})
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'statusList'
            ])
        }
    }
</script>

<style scoped>

</style>
