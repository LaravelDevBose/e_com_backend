<template>
    <!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home </a></li>
                <li><a href="#">Electronics </a></li>
                <li class="active">Machine Pro</li>-->
            </ol><!-- Block  Breadcrumb-->

            <div class="row">

                <!-- Main Content -->
                <div class="col-md-12">

                    <!-- show categori +img -->
                    <div class="block-categori-opt12 style-opt13">
                        <div class="container">
                            <div class="row" v-if="categories && categories.length > 0">
                                <div
                                    class="col-md-4"
                                    v-for="category in categories"
                                    :key="category.slug"
                                >
                                    <div class="item item1"
                                         :style="{'background-image': 'url('+ category.attachment.image_path +')'}">
                                        <div class="title">
                                            <strong class="sub-title"> {{  category.name }}</strong>
                                        </div>
                                        <ul
                                            class="list-cat"
                                            v-if="category.children && category.children.length > 0"
                                        >
                                            <li v-for="subCategory in category.children">
                                                <router-link :to="{name:'Category Products', params:{category_slug: subCategory.slug}}">
                                                    {{ subCategory.name }}
                                                </router-link>
                                                <ul v-if="subCategory.children && subCategory.children.length > 0">
                                                    <li
                                                        v-for="child in subCategory.children"
                                                        :key="child.name"
                                                    >
                                                        <router-link :to="{name:'Category Products', params:{category_slug: child.slug}}">
                                                            {{ child.name }}
                                                        </router-link>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- show categori +img-->
                </div><!-- Main Content -->

            </div>
        </div>


    </main>
    <!-- end MAIN -->

</template>

<script>
import {mapGetters} from 'vuex';
export default {
    name: "AllCategoryPage",
    computed:{
        ...mapGetters(['categories'])
    }
}
</script>

<style scoped>
.list-cat li ul{
    padding-left: 10px;
}
</style>
