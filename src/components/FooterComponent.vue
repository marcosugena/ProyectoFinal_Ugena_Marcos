<template>
  <footer class="footerclass">
    <div class="d-flex justify-content-between align-items-center">
      <div class="flist d-flex">
        <ul>
          <li><img src="../assets/informacion.png" alt=""><p>Contact us</p></li>
          <li><img src="../assets/llamada-telefonica.png" alt=""><p>Servicio al cliente</p></li>
          <li><img src="../assets/ayudar.png" alt="" class="h-100"><p class="mt-1">Centro ayuda</p></li>
          <li><img src="../assets/cookies-web.png" alt=""><p>Cookies</p></li>
          <li><img src="../assets/reembolso.png" alt=""><p>Devoluciones</p></li>
        </ul>
      </div>
      <div class="flist2 d-flex d-none d-lg-block mt-3 ">
          <ul>
            <li>Acerca de Nosotros</li>
            <li>Términos y condiciones</li>
            <li>Accesibilidad</li>
            <li>Trabaja en PowerLab</li>
          </ul>
      </div>
      <div class="flist2 d-flex d-none d-lg-block mt-3">
          <ul>
            <li>FAQ's</li>
            <li>¿Dónde está mi pedido?</li>
            <li>Envíos a España</li>
            <li>Envíos Internacionales</li>
          </ul>
      </div>
      <div class="ficons d-flex flex-row-reverse">
        <ul>
          <li><img src="../assets/instagram.png" alt="" @click="insta"/></li>
          <li><img src="../assets/tik-tok.png" alt="" @click="tiktok"/></li>
          <li><img src="../assets/twitter.png" alt="" @click="twitter" /></li>
          <li><img src="../assets/telegram.png" alt="" @click="telegram" /></li>
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
  methods: {
  insta(){
    window.location.href = 'https://www.instagram.com';
  },
  tiktok(){
    window.location.href = 'https://www.tiktok.com';
  },
  twitter(){
    window.location.href = 'https://www.twitter.com';
  },
  telegram(){
    window.location.href = 'https://www.telegram.com';
  },
  },
};
</script>
<style lang="scss" scoped>
@import "../Style/variables.scss";
.footerclass {
  z-index: 1;
  background-color: $blue;
  padding: 18px;
  height: 47vh;
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
    padding-bottom: 11px;
    margin-top: 10px;
    img{
        width: 4vh;
        height: 3vh;
        margin-right: 10px;
    }
  }
}
.flist2{
  
  li{
    list-style: none;
    color: $white;
    padding-bottom: 40px;
    padding-right: 18vh;
  }
}
.ficons {
  ul{
    margin-top: 15px;
  }
  li {
    list-style: none;
    margin-bottom: 15px;
  }
  img {
    width: 5vh;
    margin-bottom: 15px;
    margin-right: 20px;
  }
}
.fcontent{
    color: $white;
}

</style>
