<template>
    <div >
        <h2>Buyer Dashboard</h2>
        <order-table-component></order-table-component>
    </div>

</template>

<script>
import OrderTableComponent from "../../components/buyer/OrderTableComponent";
export default {
    name: "Dashboard",
    components: {OrderTableComponent}
}
</script>

<style scoped>

</style>
