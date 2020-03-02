<template>
    <div class="block-content">
        <div class="form-search">
            <form>
                <div class="box-group">
                    <input type="text" v-model="searchData.search_key" class="form-control" maxlength="70" :placeholder="$t('header.search_here')">
                    <button class="btn btn-search" :disabled="btnDisabled" type="button"><span>{{ $t('header.search')}}</span></button>
                </div>
            </form>
        </div>
        <!--<div class="categori-search  ">
            <chosen-select v-model="searchData.categoryId"  :placeholder="$t('header.all') + $tc('header.category',2)" :class-list="'categori-search-option'">
                <option :value="0">{{$t('header.select_category')}}</option>
                <option v-if="categories" v-for="(category, index) in categories"  :value="category.id"  :key="index">{{ category.name }}</option>
            </chosen-select>
        </div>-->
        <search-result-section></search-result-section>
    </div>
</template>

<script>
    import SearchResultSection from "./SearchResultSection";
    import {mapGetters, mapActions} from 'vuex';
    import _ from 'lodash';
    import ChosenSelect from "../../helper/ChosenSelect";

    export default {
        name: "SearchSection",
        components: {ChosenSelect, SearchResultSection},
        data(){
            return{
                searchData:{
                    search_key:'',
                    categoryId:'',
                },
                btnDisabled:false,
            }
        },
        mounted(){
            this.getCartDetails();
            this.getCategoryList();
        },
        methods:{
            ...mapActions([
                'getSearchDetails',
                'getCategoryList',
                'getCartDetails'
            ]),
            searchingData(){
                this.searching();
            },
            searching: _.debounce(function() {
                this.btnDisabled = true;
                this.getSearchDetails(this.searchData)
                    .then(response=>{
                        this.btnDisabled = false;
                    });
            },700)
        },
        computed:{
            ...mapGetters([
                'categories'
            ]),
            checkSearchData(){
                return JSON.parse(JSON.stringify(this.searchData))
            }
        },
        watch: {
            checkSearchData:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.searching();
                    }
                }

            }
        }
    }
</script>

<style scoped>
    #search{
        width: 100%;
        /*color: #fff;*/
    }
    .search-box input[type="text"]{
        color:#fff!important;
    }
</style>
