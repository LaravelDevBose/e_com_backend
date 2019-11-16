<template>
    <div class="content">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <other-change-section></other-change-section>
            </div>
            <div class="col-md-5">
                <password-change-section></password-change-section>
            </div>
        </div>

    </div>
</template>

<script>
    import OtherChangeSection from "./OtherChangeSection";
    import PasswordChangeSection from "./PasswordChangeSection";
    export default {
        name: "AccountSettingPage",
        components: {PasswordChangeSection, OtherChangeSection}
    }
</script>

<style scoped>

</style>
