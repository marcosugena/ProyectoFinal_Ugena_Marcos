<template>
  <footer class="footerclass">
    <div class="d-flex justify-content-between">
      <div class="flist d-flex">
        <ul>
          <li><img src="../assets/informacion.png" alt=""><p>Contact us</p></li>
          <li><img src="../assets/llamada-telefonica.png" alt=""><p>Servicio al cliente</p></li>
          <li><img src="../assets/ayudar.png" alt="" class="h-100"><p class="mt-1">Centro ayuda</p></li>
          <li><img src="../assets/cookies-web.png" alt=""><p>Cookies</p></li>
          <li><img src="../assets/reembolso.png" alt=""><p>Devoluciones</p></li>
        </ul>
      </div>
      <div class="ficons d-flex flex-row-reverse">
        <ul>
          <li><img src="../assets/instagram.png" alt="" /></li>
          <li><img src="../assets/tik-tok.png" alt="" /></li>
          <li><img src="../assets/twitter.png" alt="" /></li>
          <li><img src="../assets/telegram.png" alt="" /></li>
        </ul>
      </div>
    </div>
    <div class="fcontent">
        <p>Copyright © 2024 PowerLab. Todos los derechos reservados.</p>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {},
};
</script>
<style lang="scss" scoped>
@import "../Style/variables.scss";
.footerclass {
  z-index: 1;
  background-color: $blue;
  padding: 18px;
  height: 40vh;
  text-align: center;
  position: relative;
  bottom: 0;
  width: 100%;
}
.flist {
  li {
    display: flex;
    list-style: none;
    color: $white;
    margin-bottom: 5px;
    img{
        width: 4vh;
        height: 3vh;
        margin-right: 10px;
    }
  }
}
.ficons {
  li {
    list-style: none;
    margin-bottom: 12px;
  }
  img {
    width: 5vh;
  }
}
.fcontent{
    color: $white;
}
</style>
