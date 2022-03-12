<template>
    <div>
        <Post/>
        <CommentsList/>
        <AddCommentForm/>
    </div>
</template>

<script>
import Post from './components/Post'
import CommentsList from "./components/CommentsList";
import AddCommentForm from "./components/AddCommentForm";

export default {
    components: {Post, CommentsList, AddCommentForm},
}
</script>

<style scoped>

</style>
