<template>
  <div>
    <div
      class="containerli d-flex align-content-center justify-content-between align-items-center"
    >
      <img :src="imageurl" alt="" class="imgli" />
      <li class="text-center w-25">{{ name }}</li>
      <li>X{{ Cantidad }}</li>
      <li class="d-flex flex-column">
        <img
          src="@/assets/mas.png"
          alt=""
          class="mb-1"
          @click="addproduct(name)"
        />
        <img
          src="@/assets/menos.png"
          alt=""
          class="mt-1"
          @click="minusproduct(name)"
        />
      </li>
      <li>{{ price }}€</li>
      <li>
        <img
          src="/papelera.png"
          alt=""
          id="papelera"
          @click="deleteproduct(name)"
        />
      </li>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    price: String,
    imageurl: String,
    name: String,
    Cantidad: {
      default: 1,
      Number,
    },
  },
  methods: {
    deleteproduct(name) {
      const carrito = this.$store.getters.carrito;
      for (let i = 0; i < carrito.length; i++) {
        if (carrito[i].Nombre == name) {
          carrito.splice(i, 1);
          break;
        }
      }
      this.$store.commit("setcarrito", carrito);
    },
    addproduct(name) {
      const carrito = this.$store.getters.carrito;
      for (let i = 0; i < carrito.length; i++) {
        if (carrito[i].Nombre == name) {
          carrito[i].Cantidad++;
          break;
        }
      }
      this.$store.commit("setcarrito", carrito);
    },
    minusproduct(name) {
      const carrito = this.$store.getters.carrito;
      for (let i = 0; i < carrito.length; i++) {
        if (carrito[i].Nombre == name) {
          if (carrito[i].Cantidad != 1) {
            carrito[i].Cantidad--;
          } else {
            this.deleteproduct(name);
          }
          break;
        }
      }
      this.$store.commit("setcarrito", carrito);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";
.containerli {
  margin: 10px;
  .imgli {
    width: 80px;
    background-color: $white;
  }
  #papelera {
    width: 26px;
    margin-left: 20px;
  }
  li {
    img {
      width: 20px;
    }
  }
}
</style>
