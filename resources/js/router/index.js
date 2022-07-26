import {createRouter, createWebHistory} from 'vue-router'
import Login from "../components/Admin/Auth/Login.vue";
import Registration from "../components/Admin/Auth/Registration.vue";
import Get from "../components/Admin/Auth/Get";


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
        {
            path: '/admin/get',
            component: Get,
            name: 'admin.get'
        },

]
})

router.beforeEach((to, from, next)=> {
    const token = localStorage.getItem('x_xsrf_token')

    if (!token) {
        if(to.name === 'admin.login' || to.name === 'admin.register') {
            return next()
        } else {
            return next('/admin/login')
        }
    }

    if (to.name === 'admin.login' || to.name === 'admin.register' && token) {
        return next('/admin/get')
    }

    next()
})

export default router
