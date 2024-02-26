<template>
  <div>
    <header class="headerpower d-flex align-items-center justify-content-between">
      <div class="hmboilel mx-0">
        <img src="../assets/menu.png" alt="" id="menu" class="ms-2" @click="toggleMenu">
        <img src="../assets/lupa.png" alt="" id="lupa" class="ms-3" @click="toggleSearch">
      </div>
      <img src="../assets/PowerLab.jpg" alt="" id="logo" class="ms-2" @click="land">
      <div class="searchbardesktop mt-2 ms-lg-5">
        <input type="text" placeholder="Buscar..." class="p-2 ms-5">
      </div>
      <div class="header-right mx-lg-3 d-flex mt-1">
        <div class="d-flex align-items-center mx-lg-5">
          <img src="../assets/usuario.png" alt="" id="user" class="mx-3  ms-0" @click="PageContact">
          <p class="disp mt-3" @click="PageContact">Usuario</p>
        </div>
        <div class="d-flex align-items-center ">
          <img src="../assets/carrito-de-compras.png" alt="" id="carrito" class="mx-1">
          <p class="disp mt-3">Carrito</p>
        </div>
      </div>
      <div class="header-right-nologged d-flex">
          <button class="mx-lg-0 mt-lg-1 mx-lg-0" @click="LoginPage">Login</button>
          <button class="mx-lg-3 mt-lg-1 mx-1 ms-1" @click="RegisterPage">Register</button>
      </div>
    </header>
    <nav class="barnav w-100">
      <ul class="d-flex justify-content-between mx-5 ms-5">
        <li><router-link to="/detail">Proteína</router-link></li>
        <li><router-link to="/detail">Nutrición</router-link></li>
        <li><router-link to="/detail">Vitaminas</router-link></li>
        <li><router-link to="/detail">Barritas y Snacks</router-link></li>
        <li><router-link to="/detail">Alimentación</router-link></li>
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
        <li><router-link to="/detail">Proteína <img src="../assets/proteina-de-suero.png" alt="" id="prote"></router-link></li>
        <li><router-link to="/detail">Nutrición <img src="../assets/comida-suplementaria.png" alt=""></router-link></li>
        <li><router-link to="/detail">Vitaminas <img src="../assets/vitaminas.png" alt=""></router-link></li>
        <li><router-link to="/detail">Snacks <img src="../assets/snack.png" alt=""></router-link></li>
        <li><router-link to="/detail">Alimentación<img src="../assets/snack.png" alt=""></router-link></li>
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
      console.log(this.isSearchOpen)
      this.isSearchOpen = !this.isSearchOpen
      if(this.isSearchOpen == true){
        let input= document.getElementById("inputsearch");
        input.focus();
      }
    },
    PageContact(){
      this.$router.push('/detail');
    },
    LoginPage(){
      this.$router.push('/detail');
    },
    RegisterPage(){
      this.$router.push('/detail');
    },
    land(){
      this.$router.push("/");
    }
  },
  mounted() {
        this.$store.commit('setUsuarioLogueado', true);
        if(this.$store.getters.estadoUsuario == "No Logueado"){
          let hd=Array.from(document.getElementsByClassName("header-right"))[0];
          let hd2=Array.from(document.getElementsByClassName("header-right-nologged"))[0];
          hd.classList.add('d-none');
          hd2.classList.remove('d-none')
        }else{
          let hd=Array.from(document.getElementsByClassName("header-right"))[0];
          let hd2=Array.from(document.getElementsByClassName("header-right-nologged"))[0];
          hd2.classList.add('d-none');
          hd.classList.remove('d-none')
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
  z-index: 2;
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
        img{
          width: 33px;
          margin-left: 15px;
        }
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
  background-color: $grey;
  color: $white;
  transition:  0.5s ease-in-out;
  z-index: 1000;
 
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
.header-right-nologged{
button{
  width: 50%;
  border: 1px solid $bluelight;
  color: $bluelight;
  background-color: $black;
  border-radius: 16px;
  padding: 10px;
  padding-left: 10px;
  padding-right: 12px;
  &:hover{
    color:$white;
  }
}
}
//HEADER STYLE DESKTOP
@media only screen and (min-width: 850px){
  .headerpower{
    #user{
    width: 40px;
    height: 4.3vh;
  }
  #carrito{
    width: 45px;
    height: 4.3vh;
  }
  }
  .header-right-nologged{
button{
  padding-left: 15px;
}
}
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
  z-index: 1000;
  li{
    padding-top: 10px;
    list-style: none;
    color: $white;
    font-size: 20px;
    a{
      color: $white;
      text-decoration: none;
      &:hover{
        color: $bluelight;
      }
    }
    
  }
}
.searchbardesktop{
  display: block;
  input{
    &:hover{
      border: 2px solid $bluelight;
    }
    &:focus{
      border: 2px solid $bluelight;
    }
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
