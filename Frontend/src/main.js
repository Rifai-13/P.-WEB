import { createApp } from 'vue'
import router from './router'
import './assets/css/style.css'
import './assets/js/script.js'
import './assets/tailwind.css'

import App from './App.vue'

createApp(App).use(router).mount('#app')
