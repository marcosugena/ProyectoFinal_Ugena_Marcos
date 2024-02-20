<template>
  <div>
    <header class="headerpower d-flex align-items-center justify-content-between">
      <div class="mx-0">
        <img src="../assets/menu.png" alt="" id="menu" class="ms-2" @click="toggleMenu">
        <img src="../assets/lupa.png" alt="" id="lupa" class="ms-3" @click="toggleSearch">
      </div>
      <img src="../assets/PowerLab.jpg" alt="" id="logo" class="ms-3">
      <div class="header-right">
        <router-lik to="/detail"><img src="../assets/usuario.png" alt="" id="user" class="mx-3 ms-0"></router-lik>
        <img src="../assets/carrito-de-compras.png" alt="" id="carrito" class="mx-1">
      </div>
    </header>
    <div class="bottombar d-flex justify-content-center align-items-center" :class="{ 'bottombar-open': isSearchOpen }">
      <div class="searchbarmobile d-flex justify-content-between">
        <input type="text" class="justify-content-center align-items-center" placeholder="Buscar...">
        <div>
          <img src="../assets/lupa.png" alt="" class="" id="lupa">
        </div>
      </div>
    </div>
    <div class="sidebar" :class="{ 'sidebar-open': isMenuOpen }">
        <div class="d-flex flex-row-reverse mx-3 mt-2">
            <img src="../assets/cerrar.png" alt="" id="close" @click="toggleMenu">
        </div>
      <ul>
        <li><router-link to="/detail">Proteína</router-link></li>
        <li><router-link to="/detail">Nutrición</router-link></li>
        <li><router-link to="/detail">Vitaminas</router-link></li>
        <li><router-link to="/detail">Barritas y Snacks</router-link></li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isMenuOpen: false,
      isSearchOpen: false,
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    toggleSearch(){
      this.isSearchOpen = !this.isSearchOpen
    }
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
  position: fixed;
  top: 0;
  width: 100%;


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
  #carrito{
    width: 45px;
    height: 5.3vh;
  }
  #lupa{
    width: 35px;
    height: 4.3vh;
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
.bottombar{
  position: fixed;
  top: 12vh;
  left: -100%; 
  width: 100%;
  height: 10%;
  background-color: $blue;
  color: $white;
  transition:  0.5s ease-in-out;
 
  #lupa{
    width: 30px;
    height: 3.8vh;
  }
  input{
    background-color: $black;
    border: none;
    color: $white;
    width: 100%;
  }
  input:focus{
  outline: none;
  border: none;
  }
  .searchbarmobile{
    width: 90%;
    background-color: $black;
    padding: 10px;
    border-radius: 16px;
  }
  
}
.bottombar-open{
  left: 0; 
}
</style>
