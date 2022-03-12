<template>
    <div>
        <div class="px-8 pb-2 flex flex-col gap-5">

            <Input placeholder="User Name" v-model="comment.user_name"/>

            <div class="flex justify-center items-center gap-5">
                <TextArea v-model="comment.text" placeholder="Type Comment..."/>

                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button"
                    @click.prevent="postComment">
                    Post
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import TextArea from "./TextArea";
import Input from "./Input";

export default {
    components: {TextArea, Input},
    data() {
        return {
            comment: {
                user_name: '',
                text: '',
            }
        }
    },
    methods: {
        postComment() {
            this.$store.dispatch('comments/add', this.comment)
        }
    }
}
</script>

<style scoped>

</style>
