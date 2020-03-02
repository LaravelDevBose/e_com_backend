<template>
    <div class="btn-group">
                        <span class="label dropdown-toggle"
                              :class="{'bg-success':status == 1, 'bg-primary':status == 2, 'bg-warning':status == 3, 'bg-danger':status == 4 }"
                              data-toggle="dropdown" aria-expanded="false">
                            {{ label }}
                            <span v-if="status != 2  && status != 6" class="caret"></span>
                        </span>
        <div>
            <ul v-if="shopStatus" class="dropdown-menu dropdown-menu-right">
                <li v-for="(statusInfo, index) in shopStatus" :key="index" v-if="status != index">
                    <a href="#" @click.prevent="changeShopStatus(id, index)">
                                    <span
                                        class="status-mark position-left"
                                        :class="{'bg-success':index == 1, 'bg-primary':index == 2, 'bg-warning':index == 3, 'bg-danger':index == 4 }"
                                    ></span> {{ statusInfo }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "ShopStatusColumn",
        props:{
            id:[Number],
            status:[Number, String],
            label:[String],
        },
        created(){
            this.getShopStatus();
        },
        methods:{
            ...mapActions([
                'shopStatusChange',
                'getShopStatus'
            ]),
            changeShopStatus(sellerId, status){
                //TODO use nice Global Modal For Confirm Action

                let conf = confirm('Are You Sure Want To change Shop Status.?');
                if(!conf){
                    return false;
                }
                let reqData={
                    sellerId:sellerId,
                    status:status
                };
                this.shopStatusChange(reqData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            setTimeout( () =>{
                                location.reload();
                            }, 1500);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'shopStatus'
            ])
        }
    }
</script>

<style scoped>

</style>
