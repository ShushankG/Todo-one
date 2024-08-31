import { createApp } from 'vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import App from './components/App.vue';
import Login from './components/login.vue'; // Assuming you have a Login component

import '/resources/css/app.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';
import 'bootstrap';


import ConfirmationService from 'primevue/confirmationservice';
import Aura from '@primevue/themes/aura';
import PrimeVue from 'primevue/config';


import { BootstrapVue3 } from 'bootstrap-vue-3';
import router from './routes';



// const app = createApp(App);
// app.use(BootstrapVue3);
// app.mount('#app');
const app=createApp(App);
app.use(BootstrapVue3);
app.use(router);
app.mount('#app');
