import {createRouter, createWebHistory} from 'vue-router';


const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('../views/Home.vue')
    },
    {
        path: '/products',
        name: 'Products',
        component: () => import('../views/Products.vue')
    },
    {
        path: '/categori',
        name: 'Categori',
        component: () => import('../views/Categori.vue')       
    },
    {
        path: '/about',
        name: 'About',
        component: () => import('../views/About.vue')       
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router