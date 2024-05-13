<template>
  <div
    class="mb-3 p-1 d-flex align-items-center flex-column"
    :id="ProductId"
    @click="MostrarProducto(ProductId)"
  >
    <div
      class="productbox d-flex"
      :style="{ backgroundImage: 'url(' + imageURL + ')' }"
    ></div>
    <div class="productext d-flex justify-content-center mt-3">
      <a class="text-center" @click="MostrarProducto(ProductId)">{{
        nameproduct
      }}</a>
    </div>
    <div id="price" class="d-flex flex-column align-items-center mt-0">
      <p>{{ price }} €</p>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    price: {
      type: String,
      required: true,
    },
    nameproduct: String,
    imageURL: String,
    ProductId: Number,
  },
  methods: {
    MostrarProducto(ProductId) {
      this.$store
        .dispatch("encrypt", ProductId.toString())
        .then((hashedid) => {
          this.$router.push({ name: "ProductView", params: { id: hashedid } });
        })
        .catch((error) => {
          console.error("Error al encriptar el precio:", error);
        });
    },
  },
};
</script>
<style lang="scss" scoped>
@import "../Style/variables.scss";
.productbox {
  background-size: cover;
  height: 19vh;
  width: 19vh;
  background-color: $white;
  margin-top: 2vh;
  border-radius: 16px;
  transition: transform 0.3s, box-shadow 0.3s;
  box-shadow: 0 0 8px $grey;

  &:hover {
    transform: translateY(-10%);
    box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 20px -5px,
      rgba(180, 71, 71, 0.3) 0px 8px 8px -8px;
  }
}
.productext {
  p {
    font-size: smaller;
  }
  a {
    text-wrap: wrap;
    text-decoration: none;
    color: $white;
    &:hover {
      color: $bluelight;
    }
  }
}

#price {
  button {
    background-color: $white;
    color: $blue;
    padding: 10px;
    border-radius: 4px;
    border: 2px solid $blue;
    &:hover {
      background-color: $blue;
      color: $white;
    }
  }
  p {
    color: $white;
  }
}

@media only screen and (min-width: 800px) {
  .productbox {
    background-size: cover;
    height: 30vh;
    width: 30vh;
    background-color: $white;
    margin-top: 2vh;
    border-radius: 16px;
    transition: transform 0.3s, box-shadow 0.3s;

    &:hover {
      transform: translateY(-10%);
      box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px,
        rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
    }
  }

  .productext {
    p {
      font-size: smaller;
    }
  }
}
</style>
