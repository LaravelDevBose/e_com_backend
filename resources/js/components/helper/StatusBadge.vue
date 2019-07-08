<template>
    <div>
        <span v-if="row.status == 1" class="badge badge-success">{{ row.status_label }}</span>
        <span v-else-if="row.status == 2" class="badge badge-warning">{{ row.status_label }}</span>
        <span v-else class="badge badge-default">{{ row.status_label }}</span>
    </div>
</template>

<script>
    export default {
        name: "StatusBadge",
        props:['row'],
    }
</script>

<style scoped>

</style>