<template>
  <div>
    <header class="headerpower d-flex align-items-center justify-content-between">
      <div class="hmboilel mx-0">
        <img src="../assets/menu.png" alt="" id="menu" class="ms-2" @click="toggleMenu">
        <img src="../assets/lupa.png" alt="" id="lupa" class="ms-3" @click="toggleSearch">
      </div>
      <img src="../assets/PowerLab.jpg" alt="" id="logo" class="ms-3">
      <div class="searchbardesktop mt-2">
        <input type="text" placeholder="Buscar..." class="p-2 ms-5">
      </div>
      <div class="header-right mx-lg-5 d-flex">
        <div class="d-flex align-items-center mx-lg-5">
          <img src="../assets/usuario.png" alt="" id="user" class="mx-3  ms-0" @click="PageContact">
          <p class="disp mt-3" @click="PageContact">Usuario</p>
        </div>
        <div class="d-flex align-items-center ">
          <img src="../assets/carrito-de-compras.png" alt="" id="carrito" class="mx-1">
          <p class="disp mt-3">Carrito</p>
        </div>
      </div>
    </header>
    <nav class="barnav w-100">
      <ul class="d-flex justify-content-between mx-5 ms-5">
        <li><router-link to="/detail">Proteína</router-link></li>
        <li><router-link to="/detail">Nutrición</router-link></li>
        <li><router-link to="/detail">Vitaminas</router-link></li>
        <li><router-link to="/detail">Barritas y Snacks</router-link></li>
      </ul>
    </nav>
    <div class="bottombar d-flex justify-content-center align-items-center" :class="{ 'bottombar-open': isSearchOpen }">
      <div class="searchbarmobile d-flex justify-content-between">
        <input type="text" class="justify-content-center align-items-center" placeholder="Buscar..." id="inputsearch">
        <div>
          <img src="../assets/lupa.png" alt="" class="" id="lupa">
        </div>
      </div>
      <div class="mb-5 ms-2">
        <img src="../assets/cerrar.png" alt="" id="closesearch" @click="toggleSearch">
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
      if(this.isSearchOpen == true){
        let input= document.getElementById("inputsearch");
        input.focus();
      }
    },
    PageContact(){
      this.$router.push('/detail');
    }
  },
};
</script>

<style lang="scss" scoped>
@import '../Style/variables.scss';
//HEADER STYLE MOBILE
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
    width: 40px;
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
  transition: left 0.4s ease-in-out;
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
  #closesearch{
    height: 20px;
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
.barnav{
  display: none;
}
.searchbardesktop{
  display: none;
}
.disp{
  display: none;
}
//HEADER STYLE DESKTOP
@media only screen and (min-width: 850px){
.hmboilel{
  display: none;
}
.disp{
  display: block;
}
.barnav{
  display: block;
  background-color: $blue;
  width: 100%;
  position: fixed;
  top: 12vh;
  height: 5vh;
  padding-bottom: 0px;
  li{
    padding-top: 10px;
    list-style: none;
    color: $white;
    a{
      text-decoration: none;
      &:hover{
        color: $white;
      }
    }
    
  }
}
.searchbardesktop{
  display: block;
  input{
    border-radius: 16px;
    border: none;
    outline: none;
    width: 72vh;
  }
  .header-right{
    margin-right: 200px;
  }
}

}
</style>
