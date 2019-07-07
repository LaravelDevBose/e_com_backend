<template>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th v-for="column in columns" :key="column.name" @click="$emit('sort', column.name)"
                :class="sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'"
                :style="'width:'+column.width+';'+'cursor:pointer;'">
                {{column.label}}

            </th>
        </tr>
        </thead>
        <slot></slot>
    </table>
</template>

<script>
    import VueTableBody from './VueTableBody';

    export default {
        props:['columns', 'sortKey', 'sortOrders'],
        name: "VueDataTable",
        components:{
            'vue-table-body':VueTableBody,
        }
    }
</script>

<style scoped>

</style>
