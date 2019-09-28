<template>
    <select :multiple="multiple" :data-placeholder="placeholder" :class="classList" ><slot></slot></select>
</template>

<script>
    export default {
        name: "ChosenSelect",
        props:{
            value: [Number,String,Array],
            multiple: Boolean,
            placeholder:String,
            classList:String,
        },
        mounted(){
            $(this.$el)
                .val(this.value)
                .chosen()
                .on("change", e => this.$emit('input', $(this.$el).val()))
        },
        updated() {
            $(this.$el).trigger('chosen:updated');
        },
        watch:{
            value(val){
                $(this.$el).val(val).trigger('chosen:updated');
            }
        }
    }
</script>

<style scoped>

</style>
