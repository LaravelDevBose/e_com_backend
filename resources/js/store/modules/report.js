//declare State
const state = {

};

//declare Getters
const getters = {
};

const actions = {
    async getYearlySaleData({commit}){
        try {
            return await axios.get('/admin/report/yearly-sale');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getStatusWishOrderData({commit}){
        try {
            return await axios.get('/admin/report/status-wish');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getWeeklySaleData({commit}){
        try {
            return await axios.get('/admin/report/weekly-sale');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getMonthlySaleData({commit}){
        try {
            return await axios.get('/admin/report/monthly-sale');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },

    async getYearlyVisitorAnalyticData({commit}){
        try {
            return await axios.get('/admin/report/analytic/yearly-data');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getMonthlyVisitorAnalyticData({commit}){
        try {
            return await axios.get('/admin/report/analytic/monthly-data');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getWeeklyVisitorAnalyticData({commit}){
        try {
            return await axios.get('/admin/report/analytic/weekly-data');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getTopBrowsersAnalyticData({commit}){
        try {
            return await axios.get('/admin/report/analytic/top-browsers');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getUserBonceAnalyticData({commit}){
        try {
            return await axios.get('/admin/report/analytic/user-bounce');
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
};

const mutations = {

};

export default {
    state,
    getters,
    actions,
    mutations,
}
