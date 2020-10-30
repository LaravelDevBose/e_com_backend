<template>
    <div class="btn-group">
        <span  class="label  dropdown-toggle"
               :class="bgClass"
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
                            :class="{'bg-info':index == 1, 'bg-danger':index == 2 || index == 7, 'bg-warning':index == 3, 'bg-primary':index == 4, 'bg-indigo-400':index == 5, 'bg-teal':index == 6 }"
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
        data(){
            return{
                bgClass: 'bg-info'
            }
        },
        created() {
            switch (this.row.order_status) {
                case 1:
                    this.bgClass = 'bg-info';
                break;
                case 2:
                    this.bgClass = 'bg-danger';
                    break;
                case 3:
                    this.bgClass = 'bg-warning';
                    break;
                case 4:
                    this.bgClass = 'bg-primary';
                    break;
                case 5:
                    this.bgClass = 'bg-indigo-400';
                    break;
                case 6:
                    this.bgClass = 'bg-teal';
                    break;
                case 7:
                    this.bgClass = 'bg-danger';
                    break;
                default:
                    this.bgClass = 'bg-info';
                    break;
            }
        },
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
