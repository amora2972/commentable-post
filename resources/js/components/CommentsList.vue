<template>
    <div class="inline-flex flex-col items-baseline max-h-80 overflow-auto w-full" id="comments-list">
        <Comment v-for="comment in comments" :key="comment.id" :comment="comment"/>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import Comment from "./Comment";

export default {
    data() {
        return {
            page: 1,
            pagesFinished: false,
        }
    },
    components: {Comment},
    created() {
        this.fetchComments()
    },
    mounted() {
        const listElm = document.querySelector('#comments-list');
        listElm.addEventListener('scroll', e => {
            if(listElm.scrollTop + listElm.clientHeight >= listElm.scrollHeight) {
                ++this.page
                this.loadMore();
            }
        });
    },
    computed: {
        ...mapGetters({
            comments: 'comments/comments'
        })
    },
    methods: {
        async loadMore() {
            if (this.pagesFinished) {
                return
            }
            const response = await this.fetchComments(this.page)
            if (response.length === 0) {
                this.pagesFinished = true
            }
        },
        ...mapActions({
            fetchComments: 'comments/fetch',
        }),
    }
}
</script>

<style scoped>

</style>
