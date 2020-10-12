//declare State
const state = {
    slugs:{
        category_slug: '',
        brand_slug: '',
        tag_slug:'',
        section_slug:'',
    },
    sorting_data:{
        brand_ids:[],
        color_ids:[],
        size_ids:[],
        price:[],
        per_page: 15,
        page: 1,
        order_by: 'name',
        order_type: 'asc',
    },
    req_data:{
        category_slug: '',
        brand_slug: '',
        tag_slug:'',
        section_slug:'',
        brand_ids:[],
        color_ids:[],
        size_ids:[],
        price:{
            min: 0,
            max: 10000
        },
        per_page: 15,
        page: 1,
        order_by: 'name',
        order_type: 'asc',
    },
    color_list: [],
    size_list:[],
    product_brand_list: [],
    tag_list: [],
    page_title: '',
    product_list: [],
    meta: null,
    links: null,
    category_info: '',
    view: 1,
    product_data: {},
    related_products: [],
    variations: [],
};

//declare Getters
const getters = {
    reqData: state=> state.req_data,
    sortingData: state=>state.sorting_data,
    slugsData: state=>state.slugs,
    colorList: state=> state.color_list,
    sizeList: state => state.size_list,
    brandList: state=> state.product_brand_list,
    tagList: state => state.tag_list,
    categoryInfo: state=> state.category_info,
    products: state => state.product_list,
    metaData: state => state.meta,
    links: state => state.links,
    viewAs: state=> state.view,
    productData: state=> state.product_data,
    relatedProducts: state => state.related_products,
    variations: state=> state.variations,
    pageTitle: state=> state.page_title,
};

const actions = {
    async getProductList({state, commit}){
        try {
            await axios.post('/front/products-list', state.req_data)
                .then(({data})=>{
                    if (data.status === 200){
                        commit('updateProductsList', data);
                    }else {
                        commit('updateProductsList', []);
                    }
                })
                .catch(error=>{

                });
        }catch (error){

        }
    },
    async getProductsSidebarData({state, commit}){
        try {
            await axios.post('/front/get-sidebar-data', state.slugs)
                .then(({data})=>{
                    if (data.status === 200){
                        commit('updateSidebarData', data.data)
                    }
                });
        }catch (e){

        }
    },
    async getProductDetails({commit}, slug){
        try{
            return await axios.get(`/front/get-product/${slug}`)
                .then(({data}) =>{
                    if(data.status === 200){
                        commit('updateProductDetails', data.data);
                    }
                    return data;
                });
        }catch (error){
            console.log(error);
            return  error;
        }
    },
    async updateSlugData({commit}, data){
        try {
            commit('updateRequestData', data);
        }catch (error){
            console.log(error);
        }
    },
    async updateSortingData({commit}, data){
        try {
            console.log(data);
            commit('updateRequestData', data);
        }catch (error){
            console.log(error);
        }
    },
    async updateViewAsData({state}, data){
        try {
            state.view = data;
        }catch (error){
            console.log(error);
        }
    },
};

const mutations = {
    updateRequestData:(state, data)=>{
        if(data.hasOwnProperty('category_slug')){
            state.req_data.category_slug = data.category_slug;
            state.slugs.category_slug = data.category_slug;
        }
        if(data.hasOwnProperty('brand_slug')){
            state.req_data.brand_slug = data.brand_slug;
            state.slugs.brand_slug = data.brand_slug;
        }
        if(data.hasOwnProperty('tag_slug')){
            state.req_data.tag_slug = data.tag_slug;
            state.slugs.tag_slug = data.tag_slug;
        }
        if(data.hasOwnProperty('section_slug')){
            state.req_data.section_slug = data.section_slug;
            state.slugs.section_slug = data.section_slug;
        }
        if(data.hasOwnProperty('brand_ids')){
            state.req_data.brand_ids = data.brand_ids;
            state.sorting_data.brand_ids = data.brand_ids;
        }
        if(data.hasOwnProperty('color_ids')){
            state.req_data.color_ids = data.color_ids;
            state.sorting_data.color_ids = data.color_ids;
        }
        if(data.hasOwnProperty('size_ids')){
            state.req_data.size_ids = data.size_ids;
            state.sorting_data.size_ids = data.size_ids;
        }
        if(data.hasOwnProperty('per_page')){
            state.req_data.per_page = data.per_page;
            state.sorting_data.per_page = data.per_page;
        }
        if(data.hasOwnProperty('page')){
            state.req_data.page = data.page;
            state.sorting_data.page = data.page;
        }
        if(data.hasOwnProperty('order_by')){
            state.req_data.order_by = data.order_by;
            state.sorting_data.order_by = data.order_by;
        }
        if(data.hasOwnProperty('order_type')){
            state.req_data.order_type = data.order_type;
            state.sorting_data.order_type = data.order_type;
        }
    },
    updateProductsList:(state, response)=>{
        state.meta = response.meta;
        state.links = response.links;
        state.product_list = response.data;
    },
    updateSidebarData:(state, response)=>{
        state.page_title = response.pageTitle;
        state.color_list = response.colors;
        state.size_list = response.sizes;
        state.product_brand_list = response.brands;
        state.tag_list = response.tags;
        if(response.category !== ''){
            state.category_info = response.category;
        }
    },
    updateProductDetails:(state, response) =>{
        state.product_data = response.product;
        state.related_products = response.related_products.data;
        state.variations = response.variations;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
