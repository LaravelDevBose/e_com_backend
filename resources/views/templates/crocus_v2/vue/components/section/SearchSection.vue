<template>
    <div>
        <div class="search-box">
            <form @submit.prevent="searchingData"  id="search_mini_form" name="Categories">
                <input type="text" v-model="searchData.search_key" placeholder="Search entire store here..."  maxlength="70" name="search" id="search">
                <button type="submit" :disabled="btnDisabled" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
            </form>
        </div>
        <search-result-section></search-result-section>
    </div>
</template>

<script>
    import SearchResultSection from "./SearchResultSection";
    import {mapGetters, mapActions} from 'vuex';
    import _ from 'lodash';
    export default {
        name: "SearchSection",
        components: {SearchResultSection},
        data(){
            return{
                searchData:{
                    search_key:'',
                },
                btnDisabled:false,
            }
        },
        methods:{
            ...mapActions([
                'getSearchDetails',
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
