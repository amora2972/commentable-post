import axios from "axios"

const comments = {
    namespaced: true,
    state: () => ({
        comments: [],
    }),
    mutations: {
        setComments(state, data) {
            state.comments = data
        },
        appendComments(state, data) {
            state.comments.push(...data)
        },
        addComment(state, data) {
            state.comments.push(data)
        }
    },
    actions: {
        async fetch({commit}, page = 1) {
            let url = 'comments'
            if (page > 1) {
                url += '?page=' + page
            }
            const response = await axios.get(url)

            if (page === 1) {
                commit('setComments', response.result)
            } else {
                commit('appendComments', response.result)
            }

            return response.result
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
