<template>
    <div class="my-account">
        <div class="page-title">
            <h2>My Dashboard</h2>
        </div>
        <div class="dashboard">
            <welcome-message></welcome-message>
            <div class="recent-orders">
                <div class="title-buttons">
                    <strong>Recent Orders</strong>
                    <a href="/buyer/my-orders" >View All</a>
                </div>
                <individual-seller-order-list></individual-seller-order-list>
            </div>
        </div>
    </div>
</template>

<script>
    import WelcomeMessage from "../../section/WelcomeMessage";
    import IndividualSellerOrderList from "../order/IndividualSellerOrderList";
    export default {
        name: "IndividualSellerDashboard",
        components:{WelcomeMessage,IndividualSellerOrderList}
    }
</script>

<style scoped>

</style>
