<template>
  <HeaderComponent></HeaderComponent>
  <div class="fondonutri">
    <div v-for="producto in productos" :key="producto.id">
      <ProductComponent
        :price="producto.Precio"
        :imageURL="producto.ImagenProducto"
        :nameproduct="producto.Nombre"
        :ProductId="producto.ProductId"
      ></ProductComponent>
    </div>
  </div>
  <FooterComponent></FooterComponent>
</template>

<script>
import axios from "axios";
import ProductComponent from "@/components/ProductComponent.vue";
import HeaderComponent from "@/components/HeaderComponent.vue";
import FooterComponent from "@/components/FooterComponent.vue";
export default {
  components: {
    ProductComponent,
    HeaderComponent,
    FooterComponent,
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
        const response = await axios.get(
          this.$store.getters.backurl + "/productosalimentacion"
        );
        this.productos = response.data;
      } catch (error) {
        console.error("Error al obtener productos:", error);
      }
    },
  },
};
</script>
<style lang="scss" scoped>
@import "../../Style/variables.scss";

.fondonutri {
  min-height: 100vh;
  height: auto;
  background: linear-gradient(to bottom right, $black 30%, $blue 80%);
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0px;
}

@media only screen and (min-width: 800px) {
  .fondonutri {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0px;
  }
}
</style>
