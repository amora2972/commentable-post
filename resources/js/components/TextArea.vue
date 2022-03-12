<template>
    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              :placeholder="placeholder"
              @change="$emit('update:modelValue', $event.target.value)">{{ modelValue }}</textarea>
</template>

<script>
export default {
    props: {
        placeholder: {
            type: String,
            required: false,
            default: '',
        },
        modelValue: String,
    }
}
</script>
