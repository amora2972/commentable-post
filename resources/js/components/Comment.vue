<template>
    <div class="px-8 py-2">
        <div class="bg-gray-100 p-4 rounded-xl">
            <h3>{{ comment.user_name }}</h3>
            <p>
                {{ comment.text }}
            </p>
            <a @click.prevent="reply" class="text-blue-600 visited:text-purple-600 cursor-pointer"
               v-if="shallDisplayReply(comment.parent_id)">
                reply
            </a>
        </div>

        <div class="m-4" v-if="hasChildren">
            <Comment v-for="com in comment.children" :key="com.id" :comment="com"/>
        </div>
    </div>
</template>

<script>
import Input from "./Input";
import {mapGetters} from "vuex";

export default {
    components: {Input},
    props: {
        comment: {
            type: Object,
            required: true,
        },
    },
    computed: {
        ...mapGetters({
            comments: 'comments/comments',
        })
    },
    methods: {
        hasChildren() {
            return !!this.comment.children
        },
        reply() {
        },
        findItemNested(arr, itemId, nestingKey) {
            return arr.reduce((a, item) => {
                if (a) return a;
                if (item.id === itemId) return item;
                if (item[nestingKey]) return this.findItemNested(item[nestingKey], itemId, nestingKey)
            }, null)
        },
        shallDisplayReply(parentId) {
            if (!parentId) {
                return true;
            }

            const comments = [...this.comments];
            const firstLevel = this.findItemNested(comments, parentId, 'children')

            if (firstLevel && firstLevel.parent_id) {
                const secondLevel = this.findItemNested(comments, firstLevel.parent_id, 'children')

                if (secondLevel) {
                    return false
                }
            }

            return true
        }
    },
}
</script>

<style scoped>

</style>
