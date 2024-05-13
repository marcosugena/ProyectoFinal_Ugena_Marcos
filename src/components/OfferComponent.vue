<template>
  <div class="slideroffer">
    <img :src="imageUrl" alt="" />
  </div>
</template>
<script>
export default {
  props: {
    imageUrl: String,
  },
};
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";

.slideroffer {
  img {
    height: 40vw;
    width: 100vw;
  }

  background-size: cover;
  background-position: center;
}

@media only screen and (min-width: 800px) {
  .slideroffer {
    img {
      height: 50vh;
      width: 100%;
    }
  }
}
</style>
