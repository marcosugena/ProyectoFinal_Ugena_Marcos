<template>
    <HeaderComponent></HeaderComponent>
    <div class="fondonutri">
           <div v-for="producto in productos" :key="producto.id">
            <ProductComponent :price="producto.Precio" :imageURL="producto.ImagenProducto" :nameproduct="producto.Nombre"></ProductComponent>
           </div>
    </div>
</template>

<script>
import axios from 'axios';
import ProductComponent from '@/components/ProductComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';
export default {
    components: {
        ProductComponent,
        HeaderComponent
    },
    data() {
        return {
            productos: [],
        };
    },
    mounted() {
        this.CogeProductos();
    },
    methods: {
        async CogeProductos() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/productouno');
                this.productos = response.data;
                
            } catch (error) {
                console.error('Error al obtener productos:', error);
            }
        },
    },
};
</script>
<style lang="scss" scoped>
@import "../../Style/variables.scss";
.fondonutri{
    background-color: $black;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0px;
}
</style>
