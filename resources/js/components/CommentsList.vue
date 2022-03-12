<template>
    <div class="inline-flex flex-col items-baseline max-h-80 overflow-auto">
        <Comment v-for="comment in comments" :key="comment.id" :comment="comment"/>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import Comment from "./Comment";

export default {
    components: {Comment},
    created() {
        this.fetchComments()
    },
    computed: {
        ...mapGetters({
            comments: 'comments/comments'
        })
    },
    methods: {
        ...mapActions({
            fetchComments: 'comments/fetch',
        }),
    }
}
</script>

<style scoped>

</style>
