<template>
    <div>
        <span v-if="row.status === 1" class="badge badge-success">Active</span>
        <span v-else-if="row.status === 2" class="badge badge-warning">Inactive</span>
        <span v-else class="badge badge-default">Unknown</span>
    </div>
</template>

<script>
    export default {
        name: "ActiveInactiveStatus",
        props:['row']
    }
</script>

<style scoped>

</style>
