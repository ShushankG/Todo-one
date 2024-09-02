import { createRouter, createWebHistory } from 'vue-router';
import Todo from '@/components/Todo.vue';
import Login from '@/components/login.vue';
import Register from './components/Register.vue';

const routes = [
    { path: '/', redirect: '/login' }, // Redirect root to login
    
    { path: '/login', component: Login },
    { path: '/todo', component: Todo },
    { path: '/register', component: Register }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
