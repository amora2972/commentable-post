<template>
    <div>
        <div class="px-8 pb-2 flex flex-col gap-5">

            <div v-if="replyingTo.id" class="bg-gray-200 p-8">
                <p>
                    {{ replyingTo.text }}
                </p>
                <button @click="removeReplyingTo">x</button>
            </div>

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
import {mapGetters} from "vuex";

export default {
    components: {TextArea, Input},
    computed: {
        ...mapGetters({
            replyingTo: 'comments/replyingTo'
        })
    },
    data() {
        return {
            comment: {
                user_name: '',
                text: '',
                parent_id: null,
            }
        }
    },
    methods: {
        removeReplyingTo() {
            this.$store.commit('comments/setReplyingTo', {
                id: '',
                text: '',
            })
        },
        postComment() {
            if (this.replyingTo.id) {
                this.comment.parent_id = this.replyingTo.id
            }
            this.$store.dispatch('comments/add', this.comment)
            this.$store.commit('comments/setReplyingTo', {
                text: '',
                id: '',
            })
            this.comment = {
                user_name: '',
                text: '',
                parent_id: null,
            }
        }
    }
}
</script>

<style scoped>

</style>
