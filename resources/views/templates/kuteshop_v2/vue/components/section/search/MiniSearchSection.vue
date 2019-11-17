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
        <mini-search-result-section></mini-search-result-section>
    </div>
</template>

<script>
    import MiniSearchResultSection from  './MiniSearchResultSection'
    import {mapGetters, mapActions} from 'vuex';
    import _ from 'lodash';

    export default {
        name: "MiniSearchSection",
        components: {MiniSearchResultSection},
        data(){
            return{
                searchData:{
                    search_key:'',
                    mini:1,
                },
                btnDisabled:false,
            }
        },
        mounted(){
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
