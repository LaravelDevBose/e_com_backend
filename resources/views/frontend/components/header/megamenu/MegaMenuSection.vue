<template>
    <ul class="ui-menu">
        <li>
            <router-link :to="{name: 'Home'}">Home</router-link>
        </li>
        <li
            v-for="category in categories.filter(category=> category.header === 1)"
            :key="category.name"
            :class="{'parent parent-megamenu active' : category.children}">
            <router-link
                :to="{name:'Category Products', params:{slug: category.slug}}"
            >{{ category.name }}
            </router-link>

            <span class="toggle-submenu" v-if="category.children && category.children.length > 0"></span>
            <mega-menu-item
                :categoryInfo="category"
                v-if="category.children && category.children.length > 0"
            ></mega-menu-item>
        </li>
    </ul>
</template>

<script>
import MegaMenuItem from "./MegaMenuItem";
import {mapGetters} from 'vuex';

export default {
    name: "MegaMenuSection",
    components: {MegaMenuItem},
    computed: {
        ...mapGetters([
            'categories'
        ])
    }
}
</script>

<style scoped>

</style>
