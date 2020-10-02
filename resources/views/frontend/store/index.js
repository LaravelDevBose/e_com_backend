import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);


export default new Vuex.Store({
    state:{
        resData:'',
        errors:null,
        paginate_data:[],
        category_list: [],
        product_list: [],
        brand_list: [],

    },
    getters:{
        categories: (state) => state.category_list,
        products: state => state.product_list,
        brands: state => state.brand_list,
    },
    actions:{
        async getCategories({commit}){
            try {
                await axios.get('/front/get-categories')
                    .then(({data})=>{
                        commit('setCategoryList', data.data);
                })
            }catch (error){
                console.log(error);
            }
        }
    },
    mutations:{
        setCategoryList:(state, response)=> state.category_list = response,
    },
    modules:{

    }
})


