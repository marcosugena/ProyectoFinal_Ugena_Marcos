import { createApp } from 'vue'
import App from './App.vue'
import {createRouter,createWebHashHistory} from 'vue-router'

//BOOSTRAP
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'


//componentes
import LandingPage from '../src/pages/Landing/LandingPage.vue'
import DetailComponent from '../src/components/DetailComponent.vue'
//definir rutas
const routes=[
    {
        path:'/',component:LandingPage
    },
    {
        path:'/detail', component:DetailComponent,
    }
    
]
// crear objeto de vue router
const router =createRouter({
    history:createWebHashHistory(),
    routes
})
//Instancia de vue
const app = createApp(App)

app.use(router)
app.mount('#app')
