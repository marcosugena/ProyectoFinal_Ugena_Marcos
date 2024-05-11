import { createApp } from 'vue';
import App from './App.vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import store from './store.js'; 

// BOOSTRAP
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Componentes
import LandingPage from '../src/pages/Landing/LandingPage.vue';
import DetailComponent from '../src/components/DetailComponent.vue';
import RegisterPage from '../src/pages/Register/RegisterPage.vue';
import LoginPage from '../src/pages/LoginPage/LoginPage.vue';
import NutricionPage from '../src/pages/NutricionPage/NutricionPage.vue';
import ProteinPage from '../src/pages/ProteinPage/ProteinPage.vue';
import VitaminasPage from '../src/pages/VitaminasPage/VitaminasPage.vue';
import SnacksPage from '../src/pages/SnacksPage/SnacksPage.vue';
import AlimentacionPage from '../src/pages/AlimentacionPage/AlimentacionPage.vue';
import ProductView from '../src/pages/ProductView/ProductView.vue'
import ShoppingCartView from '../src/pages/ShoppingCartView/ShoppingCartView.vue'
import AdminPanel from '../src/pages/AdminPanel/AdminPanel.vue'
import NotFound from '../src/pages/NotFound/NotFoundPage.vue'


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
  {
    path:'/register',
    component:RegisterPage,
  },
  {
    path:'/login',
    component:LoginPage
  },
  {
    path:'/nutricion',
    component:NutricionPage
  },
  {
    path:'/proteina',
    component:ProteinPage
  },
  {
    path:'/vitaminas',
    component:VitaminasPage
  },
  {
    path:'/snacks',
    component:SnacksPage
  },
  {
    path:'/alimentacion',
    component:AlimentacionPage
  },
  { 
    path: '/producto/:id',
    name: 'ProductView',
    component: ProductView 
  },{
    path:'/ShoppingCartView',
    name: 'ShoppingCartView',
    component: ShoppingCartView
  },
  {
    path:'/admin-panel',
    component:AdminPanel
  },
  {
    path:'/:catchAll(.*)',
    component:NotFound
  }


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
