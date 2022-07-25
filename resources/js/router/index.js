import {createRouter, createWebHistory} from 'vue-router'
import Login from "../components/Admin/Auth/Login.vue";
import Registration from "../components/Admin/Auth/Registration.vue";


const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: [
        {
            path: '/admin/register',
            component: Registration,
            name: 'admin.register'

        },
        {
            path: '/admin/login',
            component: Login,
            name: 'admin.login'
        },

]
})

export default router
