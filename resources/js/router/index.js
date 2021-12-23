import {createWebHistory, createRouter} from "vue-router";

import Posts from '../pages/Posts.vue';
import Authors from '../pages/Authors.vue';

export const routes = [
    {
        name: 'posts',
        path: '/',
        component: Posts
    },
    {
        name: 'authors',
        path: '/authors',
        component: Authors
    },
];


const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
