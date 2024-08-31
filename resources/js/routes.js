import { createRouter, createWebHistory } from 'vue-router';
import Todo from './components/App.vue';
import Login from './components/login.vue';

const routes = [

    { path: '/', component: Login },
    { path: '/todo', component: Todo }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
