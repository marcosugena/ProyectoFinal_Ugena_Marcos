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
            const res = await axios.post('/api/viewproductid', { id: detalle.Idp});
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
      immediate: true, // Esto hace que el watcher se ejecute inmediatamente después de montar el componente
      handler(val) {
        if (val && val.length) {
          this.obtenerproductos();
        }
      }
    }
  }
}
</script>

<style scoped>
.history-pay {
  /* Estilos para el componente HistoryPayComponent */
}
</style>
