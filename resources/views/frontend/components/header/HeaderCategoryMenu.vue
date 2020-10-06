<template>
    <ul class="ui-categori" v-if="categories && categories.length > 0">
        <li class=""
            v-for="category in categories"
            :key="category.name"
            :class="{parent : category.children}"
        >
            <router-link :to="{name:'Category Products', params:{category_slug: category.slug}}" >
                 <span class="icon">
                    <img v-if="category.icon" :src="category.icon.image_path" alt="nav-cat">
                    <img v-else :src="$baseUrl+'/images/arrow-right.png'" alt="nav-cat">
                </span>
                {{ category.name }}
            </router-link>
            <span class="toggle-submenu" v-if="category.children && category.children.length > 0"></span>
            <category-sub-menu :categoryInfo="category" v-if="category.children && category.children.length > 0"></category-sub-menu>
        </li>
    </ul>
</template>

<script>
import {mapGetters} from 'vuex';
import CategorySubMenu from "./categoryMenu/CategorySubMenu";
export default {
    name: "HeaderCategoryMenu",
    components: {CategorySubMenu},

    created() {

    },
    computed:{
        ...mapGetters(['categories'])
    }
}
</script>

<style scoped>

</style>
