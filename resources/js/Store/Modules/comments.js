import axios from "axios"

function formatData(arr, value, dataToAdd) {
    arr.forEach(i => {
        if(i.id === value) {
            i.children = [dataToAdd, ...i.children]
        } else {
            formatData(i.children, value, dataToAdd);
        }
    });
}

const comments = {
    namespaced: true,
    state: () => ({
        comments: [],
        replyingTo: {
            text: '',
            id: '',
        }
    }),
    mutations: {
        setComments(state, data) {
            state.comments = data
        },
        appendComments(state, data) {
            state.comments.push(...data)
        },
        addComment(state, data) {
            data.children = [];
            if (data.parent_id) {
                var clonedComments = [...state.comments];
                formatData(clonedComments, data.parent_id, data)
                state.comments = clonedComments
            } else {
                state.comments.unshift(data)
            }
        },
        setReplyingTo(state, data) {
            state.replyingTo = data
        },
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
        },
        replyingTo(state) {
            return state.replyingTo
        }
    }
}

export default comments
