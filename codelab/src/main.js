import './assets/main.css'
import router from './router'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import './assets/style.css'
import { createApp } from 'vue'
import App from './App.vue'

createApp(App).use(router).mount('#app')
