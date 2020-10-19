const state = {
    token: localStorage.getItem("token") || "",
    userInfo: {},
};

const getters = {
    isAuthenticated: state => !!state.token,
};

const actions = {

    async login ({ commit}, {username, password}){
        try {
            const reqData = {
                username: username,
                password: password,
                grant_type: 'password',
                client_id: 4,
                client_secret: 'xm315XGW8CKT2sZOq7KXbr2lBdmqRedc8GKktOI2',
            }
            return await axios.post('/api/login', reqData)
                .then(({data}) => {
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('authInfoUpdate', data.data);
                        commit('updateResponse', {message: data.message, type: 'Success'});
                    }else if(data.status === 406 || data.status === 400){
                        commit('updateResponse', {message: data.message, type: 'Warning'});
                    }else{
                        commit('updateResponse', {message: "Invalid Information", type: 'Error'});
                    }
                    delete data.data;
                    return data;
                });
        }catch (error){
            commit('updateResponse', {message: "Invalid Information", type: 'Error'});
        }
    },
    async register ({ commit},reqData){
        try {
            return await axios.post('/api/register', reqData)
                .then(({data}) => {
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('authInfoUpdate', data.data)
                        commit('updateResponse', {message: data.message, type: 'Success'});
                    }else if(data.status === 406 || data.status === 400){
                        commit('updateResponse', {message: data.message, type: 'Warning'});
                    }else{
                        commit('updateResponse', {message: "Invalid Information", type: 'Error'});
                    }
                    delete data.data;
                    return data;
                });
        }catch (error){
            commit('updateResponse', {message: "Invalid Information", type: 'Error'});
        }
    },
    async logout({commit}){
        try {
            return await axios.post('/api/logout')
                .then(({data}) => {
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('userLogout');
                        commit('updateResponse', {message: data.message, type: 'Success'});
                    }else if(data.status === 400){
                        commit('updateResponse', {message: data.message, type: 'Warning'});
                    }else{
                        commit('updateResponse', {message: "Invalid Information", type: 'Error'});
                    }
                    return data;
                });
        }catch (error){
            commit('updateResponse', {message: "Invalid Information", type: 'Error'});
        }
    }

};

const mutations = {
    authInfoUpdate:(state, response)=>{
        const token = response.token_type+' '+response.access_token;
        localStorage.setItem("token", token);
        localStorage.setItem("token_id", response.token_id);
        localStorage.setItem("wishlist_product_id", response.wishlist);
        axios.defaults.headers.common['Authorization'] = token;

        state.userInfo = response.user;
        state.token = token;
    },
    userLogout:(state) =>{
        localStorage.removeItem("token");
        localStorage.removeItem("token_id");
        localStorage.removeItem("wishlist_product_id");
        delete axios.defaults.headers.common['Authorization'];

        state.userInfo = {};
        state.token = '';
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
