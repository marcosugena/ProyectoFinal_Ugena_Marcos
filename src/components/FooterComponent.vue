<template>
  <footer class="footerclass fixed-bottom position-relative">
    <div class="footer-container d-lg-flex justify-content-around align">
      <div class="d-flex flex-column p-3 text-center mt-2 ">
        <span>TIENDA ONLINE</span>
        <a href="#">Mas popular</a>
        <a href="#">Nuevos productos</a>
        <a href="#">Todos los productos</a>
      </div>
      <div class="d-flex flex-column p-3 text-center mt-2">
        <span>CONTÁCTANOS</span>
        <a href="#">Contacto</a>
        <a href="#">Devoluciones</a>
        <a href="#">Trabaja para nosotros</a>
      </div>
      <div class="d-flex flex-column p-3 text-center mt-2">
        <span>INFORMACIÓN</span>
        <a href="#">Sobre nosotros</a>
        <a href="#">Noticias</a>
        <a href="#">Términos y condiciones</a>
      </div>
      <div class="d-flex flex-column p-3 text-center mt-2">
        <span>AYUDA</span>
        <a href="#">Mas popular</a>
        <a href="#">Nuevos productos</a>
        <a href="#">Todos los productos</a>
      </div>
    </div>
    <div class="social-media d-flex flex-row justify-content-around mt-4">
      <img src="@/assets/instagram.png" alt="" @click="insta" />
      <img src="@/assets/tik-tok.png" alt="" @click="tiktok" />
      <img src="@/assets/twitter.png" alt="" @click="twitter" />
      <img src="@/assets/telegram.png" alt="" @click="telegram" />
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    insta() {
      window.location.href = 'https://www.instagram.com';
    },
    tiktok() {
      window.location.href = 'https://www.tiktok.com';
    },
    twitter() {
      window.location.href = 'https://www.twitter.com';
    },
    telegram() {
      window.location.href = 'https://www.telegram.com';
    },
  },
};
</script>
<style lang="scss" scoped>
@import "../Style/variables.scss";

.footerclass {
  z-index: 1;
  background-color: $black;
  padding: 18px;
  height: auto;
  text-align: center;
  width: 100%;
}

.footer-container {
  color: $bluelight;
  display: grid;
  grid-template-columns: 2fr;
  span {
    font-size: 20px;
  }

  a {
    color: $white;
    text-decoration: none;
    margin-top: 15px;
    font-size: 16px;
    &:hover{
      color: $bluelight;
    }
  }
}
.social-media{
  img{
    width: 5vh;
    height: 5vh;
  }
}

@media only screen and (min-width: 700px) {
  .footerclass {
  z-index: 1;
  background-color: $black;
  padding: 18px;
  height: auto;
  text-align: center;
  width: 100%;
}

.footer-container {
  color: $bluelight;

  span {
    font-size: 20px;
  }

  a {
    color: $white;
    text-decoration: none;
    margin-top: 15px;
    font-size: 16px;
    &:hover{
      color: $bluelight;
    }
  }
}
.social-media{
  img{
    width: 5vh;
    height: 5vh;
  }
}
}
</style>
