<template>
    <textarea class="summernote-height"></textarea>
</template>

<script>
    export default {
        name: "SummerNote",

        props : {
            model: {
                required: true
            },
        },
        mounted() {
            let vm = this;
            let config = this.config;
            config.callbacks = {
                onInit: function () {
                    $(vm.$el).summernote("code", vm.model);
                },
                onChange: function () {
                    vm.$emit('change', $(vm.$el).summernote('code'));
                },
                onBlur: function () {
                    vm.$emit('change', $(vm.$el).summernote('code'));
                }
            };
            $(this.$el).summernote(config);
        }
    }
</script>

<style scoped>

</style>
