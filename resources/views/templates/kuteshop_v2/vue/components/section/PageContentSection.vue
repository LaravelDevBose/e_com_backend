<template>
    <vue-editor id="body_content" :value="bodyContent" :disabled="true" :editor-toolbar="customToolbar"></vue-editor>
</template>

<script>
    import { VueEditor } from "vue2-editor";
    export default {
        name: "PageContentSection",
        props:{
            bodyContent:{
                type: String,
                default: '',
            }
        },
        components:{VueEditor},
        data() {
            return {
                customToolbar: [
                    []
                ],
            }
        }
    }
</script>

<style scoped>

</style>
