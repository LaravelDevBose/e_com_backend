<template>
    <div id="page-body">
        <page-header></page-header>
        <router-view></router-view>
        <page-footer></page-footer>

        <a href="#" class="back-to-top">
            <i aria-hidden="true" class="fa fa-angle-up"></i>
        </a>
    </div>
</template>

<script>
import PageHeader from "./components/PageHeader";
import PageFooter from "./components/PageFooter";
export default {
name: "MainApp",
    components: {PageHeader, PageFooter}
}
</script>

<style scoped>

</style>
