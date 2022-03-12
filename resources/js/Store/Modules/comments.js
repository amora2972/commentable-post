import axios from "axios"

const comments = {
    namespaced: true,
    state: () => ({
        comments: 0
    }),
    mutations: {
        setComments(state, data) {
            state.comments = data
        },
        addComment(state, data) {
            state.comments.push(data)
        }
    },
    actions: {
        async fetch({commit}) {
            const response = await axios.get('comments')
            commit('setComments', response.result)
        },
        async add({commit}, data) {
            const response = await axios.post('comments', data)
            commit('addComment', response.result)
        },
    },
    getters: {
        comments(state) {
            return state.comments
        }
    }
}

export default comments
