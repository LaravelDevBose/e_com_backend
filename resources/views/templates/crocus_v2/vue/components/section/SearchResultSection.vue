<template>
    <div class="search-content">
        <div role="complementary" class="widget_wrapper13" id="secondary">
            <div class="popular-posts widget widget__sidebar wow bounceInUp animated" id="recent-posts-4">
                <h3 class="widget-title"><span>Most Popular Post</span></h3>
                <div class="widget-content">
                    <ul class="posts-list unstyled clearfix">
                        <li>
                            <figure class="featured-thumb">
                                <a href="blog_single_post.html">
                                    <img width="50" height="50" alt="blog image" src="/crocus_v2/images/blog-img.jpg">
                                </a>
                            </figure>
                            <!--featured-thumb-->
                            <h4><a title="Pellentesque posuere" href="#/pellentesque-posuere">Blog Image Post Layout Investigationes</a></h4>
                            <p class="post-meta"><i class="icon-calendar"></i>
                                <time datetime="2014-07-10T07:09:31+00:00" class="entry-date">Jul 10, 2016</time>
                                .</p>
                        </li>
                    </ul>
                    <ul class="other-list">
                        <li class="cat-item">
                            <a class="author" href="#/first-category">Bootstrap</a>
                        </li>
                    </ul>
                </div>
                <!--widget-content-->
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name: "SearchResultSection",
        methods:{

        },
        computed:{
            ...mapGetters([
                'searchResult',
            ])
        }
    }
</script>

<style scoped>
    ul{
        list-style: none;
    }
    .other-list{
        padding-left: 0;
    }
    .other-list .author{
        padding: 5px;
        font-weight: bold;
    }
    .popular-posts{
        border: none;
        margin-bottom: 0px;
        padding-bottom:0;
    }
    .widget-content{
        padding: 5px;
    }
    .posts-list li{
        border-bottom: 1px dotted #0acde6;
    }
    .search-content{
        position: absolute;
        top: 57px;
        right: 0px;
        background: #fff;
        padding: .6rem;
        z-index: 100;
        box-shadow: 0 0 15px -7px #666;
        border-radius: 5px;
        min-width: 250px;
        width: 100%;
    }
    .search-title{
        padding-bottom: .6rem;
        margin:.5rem 0 1rem;
        border-bottom: 1px dotted #0acde6;
    }
</style>
