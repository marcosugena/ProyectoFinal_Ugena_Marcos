import { createApp } from 'vue';
import App from './App.vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import store from './store.js'; 

// BOOSTRAP
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Componentes
import LandingPage from '@/pages/Landing/LandingPage.vue';
import DetailComponent from '@/components/DetailComponent.vue';
import RegisterPage from '@/pages/Register/RegisterPage.vue';
import LoginPage from '@/pages/LoginPage/LoginPage.vue';
import NutricionPage from '@/pages/NutricionPage/NutricionPage.vue';
import ProteinPage from '@/pages/ProteinPage/ProteinPage.vue';
import VitaminasPage from '@/pages/VitaminasPage/VitaminasPage.vue';
import SnacksPage from '@/pages/SnacksPage/SnacksPage.vue';
import AlimentacionPage from '@/pages/AlimentacionPage/AlimentacionPage.vue';
import ProductView from '@/pages/ProductView/ProductView.vue'
import ShoppingCartView from '@/pages/ShoppingCartView/ShoppingCartView.vue'
import AdminPanel from '@/pages/AdminPanel/AdminPanel.vue'
import NotFound from '@/pages/NotFound/NotFoundPage.vue'
import PaymentGatewayPage from '@/pages/PaymentGatewayPage/PaymentGatewayPage.vue'

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
    path:'/paymentgateway/:totalprice',
    component:PaymentGatewayPage,
    name:'PaymentGatewayPage'
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
