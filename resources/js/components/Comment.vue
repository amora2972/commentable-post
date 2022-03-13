<template>
    <div class="px-8 py-2 inline-block">
        <div class="bg-gray-100 p-4 rounded-xl">
            <h3>{{ comment.user_name }}</h3>
            <p>
                {{ comment.text }}
            </p>
            <a @click.prevent="reply" class="text-blue-600 visited:text-purple-600 cursor-pointer">
                reply
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        comment: {
            type: Object,
            required: true,
        }
    },
    methods: {
        reply() {
            console.log('in reply...')
        }
    },
}
</script>

<style scoped>

</style>
