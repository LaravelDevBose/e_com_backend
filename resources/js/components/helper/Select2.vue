<template>
    <select class="form-control"  :name="name" :value="value" :multiple="multiple" placeholder="Select an Option" data-width="100%">
        <slot></slot>
    </select>
</template>

<script>
    export default {
        props:['options', 'value','name','multiple'],
        name: "Select2",
        data(){
            return{

            }
        },
        mounted() {
            var vm= this;
            $(this.$el)
                //int select2
                .select2({data:this.options},{
                    placeholder:'Select A Item'
                })
                .val(this.value)
                .trigger('change')
            //emit event on change
                .on('change', function () {
                    vm.$emit('input', $(this).val())
                })
        },
        updated() {
            $(this.$el).val(this.value).trigger('change');
        },
        watch:{
            value:function (value) {
                //update value
                $(this.$el).val(value).trigger('change');
            },
            options:function (options) {
                //update Option
                $(this.$el).empty().select2({data:options},{
                    placeholder:'Select A Item'
                });
            }
        },
        destroyed(){
            $(this.$el).off().select2('destroy');
        }
    }
</script>

<style scoped>

</style>
