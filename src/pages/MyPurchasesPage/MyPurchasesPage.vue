<template>
    <div class="mypurchases p-5" v-if="almacen.length > 0">
        <RouterLink to="/" class="text-white">Go Back</RouterLink>
        <HistoryPayComponent :arr="almacen" class="mt-4"></HistoryPayComponent>
    </div>
</template>

<script>
import axios from 'axios';
import HistoryPayComponent from '@/components/HistoryPayComponent.vue';

export default {
    components:{
        HistoryPayComponent
    },
    beforeMount() {
        if (this.$store.getters.estadoUsuario != "Logueado") {
            this.$router.push("/");
        }
    },
    data() {
        return {
            id: this.$store.getters.Idusu,
            Compras:[],
            Productos:[],
            almacen:[]
        }
    },
    mounted() {
        this.obtenercompras();
    },
    methods: {
        async obtenercompras() {
            try {
                const res = await axios.get(this.$store.getters.backurl + `/api/damecompras/${this.id}`);
                this.Compras = res.data;
                this.obtenerproductos();
            } catch (error) {
                console.error(error);
            }
        },
        async obtenerproductos() {
            try {
                for (const compra of this.Compras) {
                    const res2 = await axios.get(this.$store.getters.backurl + `/api/dameprs/${compra.CompraId}`);
                    this.Productos.push(res2.data);
                }
                this.almacenar();
            } catch (error) {
                console.error(error);
            }
        },
        async almacenar() {
            try {
                for (let i = 0; i < this.Compras.length; i++) {
                    let arr = [];
                    const productosArray = this.Productos[i];
                    for (let j = 0; j < productosArray.length; j++) {
                        const producto = productosArray[j];  
                        // Hacer algo con cada producto, por ejemplo, agregarlo a un array
                        let obj = {
                            Idp: producto.ProductoId,
                            Cantidad: producto.Cantidad
                        };
                        arr.push(obj);
                    }
                    let ob = {
                        precio: this.Compras[i].PrecioTotal,
                        Fecha: this.Compras[i].Fecha,
                        productos: arr
                    };
                    this.almacen.push(ob);
                }
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";
  .mypurchases {
    color: $white;
    background: linear-gradient(to bottom right, $bluelight, $black 40%, $black 50%, $bluelight 100%);
    /* Elimina la altura explícita y permite que el contenido defina la altura */
    min-height: 100vh;
    height: auto;
  }
</style>
