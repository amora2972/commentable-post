import { createStore } from 'vuex'
import comments from './Modules/comments'

const store = createStore({
    modules: {
        comments
    }
})

export default store
