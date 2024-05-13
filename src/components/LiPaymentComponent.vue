<template>
  <div
    class="lipay w-100 d-flex align-items-center justify-content-between p-5"
  >
    <div
      class="d-flex flex-column flex-lg-row justify-content-between align-items-center w-100"
    >
      <img :src="imgurl" alt="" class="imgpr mb-lg-0" />
      <p class="text-center mt-4">{{ name }}</p>
      <p class="text-center mt-4">X{{ cantidad }}</p>
      <p class="text-center mt-4">{{ precio }}€</p>
      <div
        class="infopr d-flex flex-column align-items-center justify-content-start mb-lg-1 mb-5 mt-3"
      >
        <img
          src="@/assets/masn.png"
          alt=""
          class="imgbut mb-2 mx-4"
          @click="addproduct(name)"
        /><img
          src="@/assets/menosn.png"
          alt=""
          class="imgbut"
          @click="minusproduct(name)"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    imgurl: String,
    name: String,
    cantidad: Number,
    precio: String,
  },
  methods: {
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
  },
};
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";

.lipay {
  background-color: $white;
  color: $white;
  display: flex;
  flex-direction: column;
  box-shadow: 4px 4px 40px $black;
  .imgpr {
    width: 20vh;
    height: 20vh;
    background-color: $white;
  }
}
.imgbut {
  width: 3vh;
  height: 3vh;
}

@media only screen and (min-width: 850px) {
  .lipay {
    background-color: $white;
    color: $white;
    flex-direction: row;
    box-shadow: 4px 4px 40px $black;
    .imgpr {
      width: 20vh;
      height: 20vh;
      background-color: $white;
    }
  }
  .imgbut {
    background-color: $white;
    width: 3vh;
    height: 3vh;
  }
}
</style>
