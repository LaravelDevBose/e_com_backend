<template>
    <div class="submenu">
        <div class="categori-img" v-if="categoryInfo.attachment" >
            <router-link :to="{name:'Category Products', params:{slug: categoryInfo.slug}}">
                <img :src="categoryInfo.attachment.image_path" :alt="categoryInfo.name" >
            </router-link>
        </div>
        <ul class="categori-list" >
            <li class="col-sm-3" v-for="subCategory in categoryInfo.children" :key="subCategory.name">
                <strong class="title">
                    <router-link :to="{name:'Category Products', params:{slug: subCategory.slug}}">
                        {{ subCategory.name }}
                    </router-link>
                </strong>
                <ul v-if="subCategory.children && subCategory.children.length > 0">
                    <li v-for="child in subCategory.children" :key="child.name">
                        <router-link :to="{name:'Category Products', params:{slug: child.slug}}">
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
    name: "CategorySubMenu",
    props:{
        categoryInfo: Object,
    }
}
</script>

<style scoped>

</style>
