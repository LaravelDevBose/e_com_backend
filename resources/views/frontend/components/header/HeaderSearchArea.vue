<template>
    <div class="block-search">
        <div class="block-title">
            <span>Search</span>
        </div>
        <div class="block-content">
            <div class="categori-search  ">
                <v-select>
                    <slot>
                        <option>All Categories</option>
                        <option>Fashion</option>
                        <option>Tops Blouses</option>
                        <option>Clothing</option>
                        <option>Furniture</option>
                        <option>Bathtime Goods</option>
                        <option>Shower Curtains</option>
                    </slot>
                </v-select>
            </div>
            <div class="form-search">
                <form>
                    <div class="box-group">
                        <input type="text" class="form-control" placeholder="Type Your Keyword...">
                        <button class="btn btn-search" type="button"><span>search</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "HeaderSearchArea"
}
</script>

<style scoped>

</style>
