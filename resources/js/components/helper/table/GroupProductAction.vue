<template>
    <ul class="icons-list">
        <li><a href="#" class="text text-info" @click.prevent="goToEditPage(row.id)"><i class="icon-pencil7"></i></a></li>
        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.id)"><i class="icon-trash"></i></a></li>
    </ul>
</template>

<script>
    export default {
        name: "GroupProductAction",
        props:['row'],
        methods:{
            goToEditPage(){
                alert('Not Done Yet.');
                return false;
            },
            showDeletePopUp(){
                alert('Not Done Yet.');
                return false;
            }
        }
    }
</script>

<style scoped>

</style>
