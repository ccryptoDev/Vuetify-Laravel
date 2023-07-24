import { isEmpty } from '@/utilities/helper'
const ifAuthenticated = (to, from, next) => {
    let isAuth = false
    const token = localStorage.getItem("token")
    const tokenExpiredAt = localStorage.getItem('tokenExpiredAt')
    let current = Number(new Date())
    if (current < tokenExpiredAt) {
        if (!isEmpty(token)) {
            isAuth = true
        }
    }
    if (isAuth) {
        next()
    } else {
        next({ name: 'login' })
    }
}

const ifNotAuthenticates = (to, from, next) => {
    let isAuth = false
    const token = localStorage.getItem("token")
    const tokenExpiredAt = localStorage.getItem('tokenExpiredAt')
    let current = Number(new Date())
    if (current < tokenExpiredAt) {
        if (!isEmpty(token)) {
            isAuth = true
        }
    }
    if (isAuth) {
        next('/')
    } else {
        next()
    }
}


export default [
    {
        path: '/login',
        name: 'login',
        beforeEnter: ifNotAuthenticates,
        component: () => import("@/pages/login.vue")
    },
    {
        path: '/signup',
        name: 'signup',
        beforeEnter: ifNotAuthenticates,
        component: () => import("@/pages/signup.vue")
    },
    {
        path: '/',
        name: 'root',
        beforeEnter: ifAuthenticated,
        component: () => import("@/layouts/adminDefault.vue"),
        children: [
            {
                path: '',
                name: 'todos-list',
                component: () => import("@/pages/todos/List.vue"),
            },
            {
                path: 'add',
                name: 'todos-add',
                component: () => import("@/pages/todos/Add.vue")
            },
            {
                path: 'edit/:uuid',
                name: 'todos-edit',
                component: () => import("@/pages/todos/Edit.vue")
            },
        ]
    },

    {
        path: '/todos',
        beforeEnter: ifAuthenticated,
        component: () => import("@/layouts/adminDefault.vue"),
        children: [
            {
                path: '',
                name: 'todos-list',
                component: () => import("@/pages/todos/List.vue"),
            },
            {
                path: 'add',
                name: 'todos-add',
                component: () => import("@/pages/todos/Add.vue")
            },
            {
                path: 'edit/:uuid',
                name: 'todos-edit',
                component: () => import("@/pages/todos/Edit.vue")
            },
        ]
    },
    
]