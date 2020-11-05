<template>
    <div class="block-search">
        <div class="block-title">
            <span>Search</span>
        </div>
        <div class="block-content">
            <div class="form-search">
                <form>
                    <div class="box-group">
                        <input type="text" class="form-control" v-model="searchData.search_key" placeholder="Type Your Keyword...">
                        <button class="btn btn-search" type="button" :disabled="btnDisabled"><span>search</span></button>
                    </div>
                </form>
            </div>
            <search-result-section></search-result-section>
        </div>

    </div>
</template>

<script>
import _ from "lodash";
import { mapActions} from 'vuex';
import SearchResultSection from "./search/SearchResultSection";
export default {
    name: "HeaderSearchArea",
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
        ...mapActions(['getSearchDetails']),
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

</style>
