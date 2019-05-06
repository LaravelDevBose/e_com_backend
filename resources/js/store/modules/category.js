//declare State
const state = {
    options: [ {
        id: 'a',
        label: 'a',
        children: [ {
            id: 'aa',
            label: 'aa',
        }, {
            id: 'ab',
            label: 'ab',
        } ],
    }, {
        id: 'b',
        label: 'b',
    }, {
        id: 'c',
        label: 'c',
    } ],
};

//declare Getters
const getters = {
    categories:(state)=>state.options
};

const actions = {};

const mutations = {};

export default {
    state,
    getters,
    actions,
    mutations,
}
