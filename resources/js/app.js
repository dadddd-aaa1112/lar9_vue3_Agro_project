import './bootstrap';

import { createApp } from 'vue'

import router from './router'
import App from './App.vue'
import axios from 'axios'

const app = createApp(App)

app.use(router)
// app.component('app', App)
app.config.globalProperties.axios = axios
app.mount('#app')
