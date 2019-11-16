<template>
    <div>
        <span v-if="row.status === 1" class="badge badge-info">Active</span>
        <span v-else-if="row.status === 2" class="badge badge-danger">Inactive</span>
        <span v-else-if="row.status === 3" class="badge badge-success">Live</span>
        <span v-else-if="row.status === 4" class="badge badge-warning">Expired</span>
        <span v-else class="badge badge-default">Unknown</span>
    </div>
</template>

<script>
    export default {
        name: "GroupProductStatus",
        props:['row']
    }
</script>

<style scoped>

</style>
