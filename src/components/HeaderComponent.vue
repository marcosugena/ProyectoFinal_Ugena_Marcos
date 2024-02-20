<template>
  <div>
    <header class="headerpower d-flex align-items-center justify-content-between">
      <img src="../assets/menu.png" alt="" id="menu" class="ms-2" @click="toggleMenu">
      <img src="../assets/PowerLab.jpg" alt="" id="logo">
      <router-link to="/detail"><img src="../assets/usuario.png" alt="" id="user" class="mx-2"></router-link>
    </header>
    <div class="sidebar" :class="{ 'sidebar-open': isMenuOpen }">
        <div class="d-flex flex-row-reverse mx-3 mt-2">
            <img src="../assets/cerrar.png" alt="" id="close" @click="toggleMenu">
        </div>
      <ul>
        <li><router-link to="/detail">Proteína</router-link></li>
        <li><router-link to="/detail">Nutrición</router-link></li>
        <li><router-link to="/detail">Vitaminas</router-link></li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isMenuOpen: false,
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
  },
};
</script>

<style lang="scss" scoped>
@import '../Style/variables.scss';

.headerpower {
  background-color: $black;
  color: $white;
  height: 12vh;
  width: 100%;
  margin: 0;
  position: fixed;
  top: 0;
  width: 100%;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
  #menu {
    width: 32px;
    height: 6.3vh;
  }
  #logo {
    width: 100px;
    height: 12vh;
  }
  #user{
    width: 38px;
    height: 5.3vh;
  }
}

.sidebar {
  position: fixed;
  top: 12vh;
  left: -250px; 
  width: 250px;
  height: 100%;
  background-color: $black;
  color: $white;
  transition: left 0.3s ease-in-out;
  #close{
    width: 18px;
    height: 18px;
  }
  ul{
    list-style: none;
    margin-top: 2vh;
    li{
        padding-bottom: 30px;
        font-size: 23px;
        
        a{
            text-decoration: none;
            color: $bluelight;
        }
    }
  }
}
.sidebar-open {
  left: 0; 
}
</style>
