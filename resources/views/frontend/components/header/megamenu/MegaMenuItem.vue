<template>
    <div class="megamenu drop-menu" v-if="categoryInfo">
        <ul>
            <li class="col-md-3" v-for="subCategory in categoryInfo.children" :key="subCategory.name" >
                <strong class="title">
                    <router-link :to="{name:'Category Products', params:{category_slug: subCategory.slug}}">
                        <span>{{ subCategory.name }}</span>
                    </router-link>
                </strong>
                <ul class="list-submenu" v-if="subCategory.children && subCategory.children.length > 0">
                    <li v-for="child in subCategory.children" :key="child.name">
                        <router-link :to="{name:'Category Products', params:{category_slug: child.slug}}">
                            {{ child.name }}
                        </router-link>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "MegaMenuItem",
    props:{
        categoryInfo: Object,
    }
}
</script>

<style scoped>

</style>
