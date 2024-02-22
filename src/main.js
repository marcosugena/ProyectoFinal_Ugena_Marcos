import { createApp } from 'vue';
import App from './App.vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import store from './store.js'; 

// BOOSTRAP
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

// Componentes
import LandingPage from '../src/pages/Landing/LandingPage.vue';
import DetailComponent from '../src/components/DetailComponent.vue';

// Definir rutas
const routes = [
  {
    path: '/',
    component: LandingPage,
  },
  {
    path: '/detail',
    component: DetailComponent,
  },
];

// Crear objeto de Vue Router
const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

// Instancia de Vue
const app = createApp(App);

// Usa el router y el store en la aplicación
app.use(router);
app.use(store); // Usa el store Vuex

app.mount('#app');
