<template>
    <div class="my-account">
        <div class="page-title">
            <h2>{{ $t('buyer.dashboard.seller_dashboard')}}</h2>
        </div>
        <div class="dashboard">
            <div class="recent-orders">
                <individual-seller-order-list></individual-seller-order-list>
            </div>
        </div>
    </div>
</template>

<script>
    import IndividualSellerOrderList from "../order/IndividualSellerOrderList";
    export default {
        name: "IndividualSellerDashboard",
        components:{IndividualSellerOrderList}
    }
</script>

<style scoped>

</style>
