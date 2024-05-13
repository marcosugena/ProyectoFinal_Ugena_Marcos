<template>
  <div class="history-pay">
    <h2>Historial de Compras</h2>
    <div v-for="(compra, index) in arr" :key="index" class="mt-4">
      <h3>Compra {{ index + 1 }}</h3>
      <div class="table-responsive">
        <table class="table table-striped table-dark text-center">
          <thead>
            <tr>
              <th>Precio Total</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ compra.precio }}€</td>
              <td>{{ compra.Fecha }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <h4>Productos</h4>
      <div class="table-responsive">
        <table class="table table-bordered table-dark text-center">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(producto, i) in compra.productos" :key="i">
              <td><img :src="producto.imagen" alt="Producto" width="50"></td>
              <td>{{ producto.nombre }}</td>
              <td>{{ producto.precio }}</td>
              <td>{{ producto.Cantidad }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    arr: {
      type: Array,
      required: true
    }
  },
  methods: {
    async obtenerproductos() {
      try {
        for (const compra of this.arr) {
          for (const detalle of compra.productos) {
            const res = await axios.post(this.$store.getters.backurl+'/api/viewproductid', { id: detalle.Idp});
            detalle.nombre = res.data.Nombre;
            detalle.imagen = res.data.ImagenProducto;
            detalle.precio = res.data.Precio;
          }
        }
      } catch (error) {
        console.error(error);
      }
    }
  },
  watch: {
    arr: {
      immediate: true,
      handler(val) {
        if (val && val.length) {
          this.obtenerproductos();
        }
      }
    }
  }
}
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";
.history-pay {
  img{
    background-color: $white;
    width: 5vh;
    height: 5vh;
  }
 
}
@media only screen and (min-width: 850px) {
  .history-pay {
  img{
    width: 10vh;
    height: 10vh;
  }
  }
}
</style>
