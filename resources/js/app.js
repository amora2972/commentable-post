import { createApp } from "vue"
import App from './App.vue'
import Store from './Store'
import axios from "axios"

axios.defaults.baseURL = process.env.MIX_API_BASE_URL;

axios.interceptors.response.use(function (response) {
    return response.data;
}, function (error) {
    return Promise.reject(error);
});

createApp({
    components: {
        App
    },
}).use(Store).mount("#app")
