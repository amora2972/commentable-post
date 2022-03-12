<template>
    <div class="px-8 py-2 inline-block">
        <div class="bg-gray-100 p-4 rounded-xl">
            <h3>{{ comment.user_name }}</h3>
            <p>
                {{ comment.text }}
            </p>
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
    }
}
</script>

<style scoped>

</style>
