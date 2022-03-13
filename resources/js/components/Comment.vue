<template>
    <div class="px-8 py-2">
        <div class="bg-gray-100 p-4 rounded-xl">
            <h3>{{ comment.user_name }}</h3>
            <p>
                {{ comment.text }}
            </p>
            <a @click.prevent="reply" class="text-blue-600 visited:text-purple-600 cursor-pointer">
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

export default {
    components: {Input},
    props: {
        comment: {
            type: Object,
            required: true,
        },
    },
    methods: {
        hasChildren() {
            return !!this.comment.children
        },
        reply() {
        }
    },
}
</script>

<style scoped>

</style>
