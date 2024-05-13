<template>
  <div class="headercomponent">
    <header
      class="headerpower d-flex align-items-center justify-content-between"
    >
      <div class="hmboilel mx-0">
        <img
          src="@/assets/menu.png"
          alt=""
          id="menu"
          class="ms-2"
          @click="Menu"
        />
        <img
          src="@/assets/lupa.png"
          alt=""
          id="lupa"
          class="ms-3"
          @click="Search"
        />
      </div>
      <img
        src="@/assets/PowerLab.jpg"
        alt=""
        id="logo"
        class="ms-2 ms-lg-1"
        @click="landing"
      />
      <div
        class="searchbardesktop mt-2 ms-lg-5 d-flex justify-content-center flex-column"
      >
        <input
          type="text"
          placeholder="Buscar..."
          class="p-2 ms-5"
          v-on:input="search"
          v-model="searchtext.texto"
          v-on:focus="revelainput"
          v-on:blur="ocultainput"
          id="inpudesk"
        />
        <div class="d-flex justify-content-center w-100">
          <div class="dropdown-menusearch text-center" id="dropdown-menusearch">
            <ul id="listsearchdesktop"></ul>
          </div>
        </div>
      </div>
      <div class="header-right d-flex mt-1">
        <div
          class="d-flex align-items-center mx-lg-5 useroptions"
          id="optionsmobile"
          v-on:mouseover="OpenDropdown()"
          v-on:mouseout="OpenDropdown()"
        >
          <img
            src="@/assets/usuario.png"
            alt=""
            id="user"
            class="mx-3 ms-0 mb-1"
          />
          <p class="disp mt-3 fw-bold" @click="PageContact">
            {{ this.$store.getters.nombreDeUsuario }}
          </p>
          <div class="dropdown-menu" id="dropdownmenumb">
            <ul class="text-center">
              <li><RouterLink to="/mypurchases">Mis Compras</RouterLink></li>
              <li @click="Logout()">Cerrar Sesión</li>
              <li v-if="this.$store.getters.Admin">
                <RouterLink to="/admin-panel">Admin Panel</RouterLink>
              </li>
            </ul>
          </div>
        </div>
        <div
          class="d-flex align-items-center carrito mx-2"
          v-on:mouseover="mostrarcarritoo"
          v-on:mouseout="ocultarcarrito"
        >
          <p class="mb-4 numbercar">{{ this.$store.getters.carrito.length }}</p>
          <img
            src="@/assets/carrito-de-compras.png"
            alt=""
            id="carrito"
            class="mx-0 mx-lg-3"
            @click="MostrarCarrito()"
          />
          <div
            class="dropdown-menu2 position-fixed top-0 end-0 p-3"
            style="z-index: 1030"
            id="dropdownmenu2help2"
          >
            <ul id="carritopr">
              <LiCarComponent
                v-for="producto in carrito"
                :key="producto.Id"
                :price="producto.Precio"
                :imageurl="producto.ImagenProducto"
                :name="producto.Nombre"
                :Cantidad="producto.Cantidad"
              >
              </LiCarComponent>
              <p class="w-100 text-end">Precio Total: {{ price }}€</p>
            </ul>
          </div>
        </div>
      </div>
      <div class="header-right-nologged d-flex">
        <button class="mt-lg-2 mx-lg-0" @click="LoginPage">Login</button>
        <button class="mx-lg-4 mt-lg-2" @click="RegisterPage" id="regbutton">
          Register
        </button>

        <div
          class="d-flex align-items-center carrito mt-2"
          v-on:mouseover="mostrarcarritoo"
          v-on:mouseout="ocultarcarrito"
        >
          <p class="mb-4 ms-3 numbercar ms-lg-0" id="numbercar">
            {{ this.$store.getters.carrito.length }}
          </p>
          <img
            src="@/assets/carrito-de-compras.png"
            alt=""
            id="carrito"
            class="mx-1 d-none d-lg-block mx-lg-4"
            @click="MostrarCarrito()"
          />
          <div
            class="dropdown-menu2 position-fixed top-0 end-0 p-3"
            id="dropdownmenu2help"
            style="z-index: 1030"
          >
            <ul id="carritopr">
              <LiCarComponent
                v-for="producto in carrito"
                :key="producto.Id"
                :price="producto.Precio"
                :imageurl="producto.ImagenProducto"
                :name="producto.Nombre"
                :Cantidad="producto.Cantidad"
              >
              </LiCarComponent>
              <p class="w-100 text-end">Precio Total: {{ price }}€</p>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <nav class="barnav w-100">
      <div
        class="d-flex align-items-center flex-row justify-content-around h-100"
      >
        <div><router-link to="/proteina">Proteína</router-link></div>
        <div><router-link to="/nutricion">Nutrición</router-link></div>
        <div><router-link to="/vitaminas">Vitaminas</router-link></div>
        <div><router-link to="/snacks">Barritas y Snacks</router-link></div>
        <div><router-link to="/alimentacion">Alimentación</router-link></div>
      </div>
    </nav>
    <div
      class="bottombar d-flex justify-content-center align-items-center"
      :class="{ 'bottombar-open': isSearchOpen }"
    >
      <div class="searchbarmobile d-flex justify-content-between">
        <input
          type="text"
          class="justify-content-center align-items-center"
          placeholder="Buscar..."
          id="inputsearch"
          v-model="searchtext.texto"
          v-on:input="searchmobile"
        />
        <div>
          <img src="@/assets/lupa.png" alt="" class="" id="lupamobile" />
        </div>
      </div>
      <div class="mb-5 ms-2">
        <img
          src="@/assets/cerrar.png"
          alt=""
          id="closesearch"
          @click="Search"
        />
      </div>
    </div>
    <div class="dropdown-menumobile text-center p-3" id="listsearchmobile">
      <ul class="p-1"></ul>
    </div>
    <div class="sidebar" :class="{ 'sidebar-open': isMenuOpen }">
      <div class="d-flex flex-row-reverse mx-3 mt-2">
        <img src="@/assets/cerrar.png" alt="" id="close" @click="Menu" />
      </div>
      <ul>
        <li>
          <router-link to="/detail"
            >Proteína
            <img src="@/assets/proteina-de-suero.png" alt="" id="prote"
          /></router-link>
        </li>
        <li>
          <router-link to="/nutricion"
            >Nutrición <img src="@/assets/comida-suplementaria.png" alt=""
          /></router-link>
        </li>
        <li>
          <router-link to="/detail"
            >Vitaminas <img src="@/assets/vitaminas.png" alt=""
          /></router-link>
        </li>
        <li>
          <router-link to="/detail"
            >Snacks <img src="@/assets/snack.png" alt=""
          /></router-link>
        </li>
        <li>
          <router-link to="/detail"
            >Alimentación<img src="@/assets/alimentacion-saludable.png" alt=""
          /></router-link>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import LiCarComponent from "../components/LiCarComponent.vue";
export default {
  components: {
    LiCarComponent,
  },
  data() {
    return {
      isMenuOpen: false,
      isSearchOpen: false,
      isOptionOpen: false,
      isCarritoOpen: false,
      UserName: "a",
      searchtext: {
        texto: "",
      },
      searchcontent: [],
      carrito: [],
      price: 0,
    };
  },
  methods: {
    async Logout() {
      window.location.reload();
      this.$store.commit("setUsuarioLogueado", false);
      this.$store.commit("setUserName", "");
      this.$store.commit("setId", 0);
      this.$store.commit("setAdmin", false);
    },
    MostrarCarrito() {
      if (this.$store.getters.carrito.length != 0) {
        this.$router.push({ name: "ShoppingCartView" });
      }
    },
    actualizaprice() {
      const carrito = this.$store.getters.carrito;
      let precio = 0;
      carrito.forEach((pr) => {
        precio += pr.Precio * pr.Cantidad;
        this.price = precio.toFixed(2);
      });
    },
    shouldHideElement() {
      const numbercar = document.getElementById("numbercar");
      if (
        this.$store.getters.estadoUsuario == "No Logueado" &&
        window.innerWidth < 992 &&
        numbercar != null
      ) {
        numbercar.style.display = "none";
      } else if (numbercar != null) {
        numbercar.style.display = "block";
      }
    },
    ocultarcarrito() {
      const div = document.getElementById("dropdownmenu2help");
      const div2 = document.getElementById("dropdownmenu2help2");
      if (this.$store.getters.estadoUsuario == "No Logueado") {
        div.style.display = "none";
      } else {
        div2.style.display = "none";
      }
    },
    mostrarcarritoo() {
      if (window.innerWidth > 800) {
        const div = document.getElementById("dropdownmenu2help");
        const div2 = document.getElementById("dropdownmenu2help2");
        if (this.$store.getters.estadoUsuario == "No Logueado") {
          if (this.$store.getters.carrito.length != 0) {
            div.style.display = "block";
          } else {
            div.style.display = "none";
          }
        } else {
          if (this.$store.getters.carrito.length != 0) {
            div2.style.display = "block";
          } else {
            div2.style.display = "none";
          }
        }
      }
    },
    async actualizacarrito() {
      this.carrito = this.$store.getters.carrito;
    },
    async muestraproducto(ID) {
      if (this.isSearchOpen) {
        this.isSearchOpen = !this.isSearchOpen;
        let busq = document.getElementById("listsearchmobile");
        busq.style.display = "none";
      }
      this.$store
        .dispatch("encrypt", ID.toString())
        .then((hashedid) => {
          this.$router.push({ name: "ProductView", params: { id: hashedid } });
        })
        .catch((error) => {
          console.error("Error al encriptar el precio:", error);
        });
    },
    ocultainput() {
      setTimeout(() => {
        let div = document.getElementById("dropdown-menusearch");
        if (div != null) {
          div.style.display = "none";
        }
      }, 200);
    },
    revelainput() {
      document.getElementById("dropdown-menusearch").style.display = "block";
    },
    async search() {
      try {
        const response = await axios.post(
          this.$store.getters.backurl + "/api/search",
          {
            palabra: this.searchtext.texto,
          }
        );
        this.searchcontent = response.data;
        let list = document.getElementById("listsearchdesktop");
        while (list.firstChild) {
          list.removeChild(list.firstChild);
        }
        for (let i = 0; i < this.searchcontent.length; i++) {
          if (this.searchtext.texto.length == 0) {
            if (i == 4) {
              break;
            }
          }
          let li = document.createElement("li");
          li.textContent = this.searchcontent[i].Nombre;
          li.addEventListener("click", () => {
            this.muestraproducto(this.searchcontent[i].ProductId);
          });

          li.addEventListener("mouseover", function () {
            li.style.backgroundColor = "white";
            li.style.color = "black";
          });
          li.addEventListener("mouseout", function () {
            li.style.backgroundColor = "#262626";
            li.style.color = "white";
          });

          li.style.padding = "10px";
          li.style.borderRadius = "10px";
          list.appendChild(li);
        }
      } catch (error) {
        console.error("Error al obtener productos:", error);
      }
    },
    async searchmobile() {
      try {
        const response = await axios.post(
          this.$store.getters.backurl + "/api/search",
          {
            palabra: this.searchtext.texto,
          }
        );
        this.searchcontent = response.data;
        let list = document.getElementById("listsearchmobile");
        list.style.display = "block";
        while (list.firstChild) {
          list.removeChild(list.firstChild);
        }
        for (let i = 0; i < this.searchcontent.length; i++) {
          if (this.searchtext.texto.length == 0) {
            if (i == 4) {
              break;
            }
          }
          let li = document.createElement("li");
          li.textContent = this.searchcontent[i].Nombre;
          li.addEventListener("click", () => {
            this.muestraproducto(this.searchcontent[i].ProductId);
          });
          li.style.listStyle = "none";
          li.addEventListener("mouseover", function () {
            li.style.backgroundColor = "white";
            li.style.color = "black";
          });
          li.addEventListener("mouseout", function () {
            li.style.backgroundColor = "#262626";
            li.style.color = "white";
          });
          li.style.padding = "12px";
          list.appendChild(li);
        }
      } catch (error) {
        console.error("Error al obtener productos:", error);
      }
    },
    Menu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    OpenDropdown() {
      let div = document.getElementById("dropdownmenumb");
      if (div.style.display == "block") {
        div.style.display = "none";
      } else {
        div.style.display = "block";
      }
    },
    Search() {
      let list = document.getElementById("listsearchmobile");
      list.style.display = "none";
      this.isSearchOpen = !this.isSearchOpen;
      if (this.isSearchOpen == true) {
        let input = document.getElementById("inputsearch");
        input.focus();
      }
    },
    LoginPage() {
      this.$router.push("/login");
    },
    RegisterPage() {
      this.$router.push("/register");
    },
    landing() {
      this.$router.push("/");
    },
    comprueba() {
      if (this.$store.getters.carrito.length == 0) {
        const div = document.getElementById("dropdownmenu2help");
        const div2 = document.getElementById("dropdownmenu2help2");
        div.style.display = "none";
        div2.style.display = "none";
      }
    },
  },
  mounted() {
    window.addEventListener("resize", () => this.shouldHideElement());
    this.shouldHideElement();
    this.actualizacarrito();
    this.actualizaprice();
    if (this.$store.getters.estadoUsuario == "No Logueado") {
      let hd = Array.from(document.getElementsByClassName("header-right"))[0];
      let hd2 = Array.from(
        document.getElementsByClassName("header-right-nologged")
      )[0];
      hd.classList.add("d-none");
      hd2.classList.remove("d-none");
    } else {
      let hd = Array.from(document.getElementsByClassName("header-right"))[0];
      let hd2 = Array.from(
        document.getElementsByClassName("header-right-nologged")
      )[0];
      hd2.classList.add("d-none");
      hd.classList.remove("d-none");
    }
  },
  watch: {
    "$store.getters.carrito": {
      handler() {
        this.actualizacarrito();
        this.actualizaprice();
      },
      deep: true,
    },
    "$store.getters.carrito.length": {
      handler() {
        this.comprueba();
      },
    },
  },
};
</script>
<style lang="scss" scoped>
@import "../Style/variables.scss";

//HEADER STYLE MOBILE
.numbercar {
  background-color: red;
  position: fixed;
  right: 1vw;
  padding: 2px;
  padding-left: 5px;
  padding-right: 5px;
  border-radius: 360px;
  margin-left: 35 px;
}

.dropdown-menumobile {
  position: fixed;
  top: 20vh;
  width: 100%;
  background-color: $black;
  z-index: 1;
  color: $white;
  display: none;
  ul {
    list-style: none;
  }

  li {
    padding: 10px;
  }
}

@mixin dropdown-menu {
  display: none;
  position: absolute;
  right: 0%;
  top: 98%;
  z-index: 10;
  background-color: $black;
  color: $white;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);

  ul {
    list-style: none;
    padding: 0;
    margin: 0;

    li {
      padding: 10px;
      font-size: 16px;
      &:hover {
        color: $bluelight;
      }
      a {
        text-decoration: none;
        color: $white;

        &:hover {
          color: $bluelight;
        }
      }
    }
  }
}

.dropdown-menu {
  @include dropdown-menu;
}

.dropdown-menu2 {
  display: none;
  margin-top: 4.35vw;
  z-index: 10;
  background-color: $black;
  color: $white;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
  width: 570px;
  padding: 20px;

  &:hover {
    display: block;
  }

  ul {
    list-style: none;
    padding: 0;
    margin: 0;

    li {
      padding: 10px;
      font-size: 16px;

      a {
        text-decoration: none;
        color: $white;

        &:hover {
          color: $bluelight;
        }
      }
    }
  }
}

.dropdown-menusearch {
  background-color: $black;
  padding: 5px;
  position: absolute;
  width: 50vh;
  margin-left: 45px;
  margin-top: 6px;
  display: none;
  border-radius: 8px;

  ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  li {
    padding: 30px;
    font-size: 32px;
    color: $white;

    &:hover {
      background-color: $white;
      color: $black;
    }
  }
}

.headercomponent {
  margin-bottom: 10vh;
}

.headerpower {
  background-color: $black;
  color: $white;
  height: 10.5vh;
  width: 100%;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
  padding-bottom: 0px;

  #menu {
    width: 4vh;
    height: 5vh;
  }

  #logo {
    width: 100px;
    height: 12vh;
  }

  #user {
    width: 35px;
    height: 35px;
  }

  #carrito {
    width: 45px;
    height: 5.3vh;
  }

  #lupa {
    width: 3.5vh;
    height: 3.5vh;
  }
}

.sidebar {
  z-index: 2;
  position: fixed;
  top: 10vh;
  left: -250px;
  width: 250px;
  height: 100%;
  background-color: $black;
  color: $white;
  transition: left 0.4s ease-in-out;

  #close {
    width: 18px;
    height: 18px;
  }

  ul {
    list-style: none;
    margin-top: 2vh;

    li {
      padding-bottom: 30px;
      font-size: 23px;

      img {
        width: 33px;
        margin-left: 15px;
      }

      a {
        text-decoration: none;
        color: $bluelight;
      }
    }
  }
}

.sidebar-open {
  left: 0;
}

.bottombar {
  position: fixed;
  top: 10vh;
  left: -100%;
  width: 100%;
  height: 10%;
  background-color: $black;
  color: $white;
  transition: 0.5s ease-in-out;
  z-index: 1000;
  #lupamobile {
    width: 3vh;
    height: 3vh;
  }

  input {
    background-color: $black;
    border: none;
    color: $white;
    width: 100%;
  }

  input:focus {
    outline: none;
    border: none;
  }

  #closesearch {
    padding: 4px;
    margin-top: 10px;
    height: 3vh;
  }

  .searchbarmobile {
    width: 90%;
    background-color: $black;
    padding: 10px;
    border-radius: 16px;
  }
}

.bottombar-open {
  left: 0;
}

.barnav {
  display: none;
}

.searchbardesktop {
  display: none;
}

.disp {
  display: none;
}

.header-right-nologged {
  button {
    width: 50%;
    border: 1px solid $bluelight;
    color: $bluelight;
    background-color: $black;
    border-radius: 3px;
    padding: 8px;
    padding-left: 10px;
    padding-right: 12px;
    margin-right: 5px;
    height: 10%;

    &:hover {
      color: $white;
    }
  }

  #regbutton {
    background-color: $bluelight;
    color: $white;
  }
}

#inpudesk {
  display: none;
}

//HEADER STYLE DESKTOP
@media only screen and (min-width: 800px) {
  .numbercar {
    background-color: red;
    position: fixed;
    right: 1vw;
    padding: 3px;
    padding-left: 6px;
    padding-right: 7px;
    border-radius: 360px;
  }

  #inpudesk {
    display: block;
  }

  @mixin dropdown-menu {
    display: none;
    position: absolute;
    top: 70%;
    z-index: 10;
    background-color: $black;
    color: $white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    right: auto;

    ul {
      list-style: none;
      padding: 0;
      margin: 0;

      li {
        padding: 10px;
        font-size: 16px;

        a {
          text-decoration: none;
          color: $white;

          &:hover {
            color: $bluelight;
          }
        }
      }
    }
  }

  .dropdown-menu {
    @include dropdown-menu;
  }

  .headercomponent {
    margin-bottom: 17vh;
  }

  .headerpower {
    height: 12.5vh;

    #user {
      width: 35px;
      height: 35px;
    }

    #carrito {
      width: 5vh;
      height: 5vh;
      margin-left: 20px;
    }

    #lupa {
      width: 4vh;
      height: 4vh;
    }
  }

  .header-right-nologged {
    button {
      padding-left: 13px;
    }
  }

  .hmboilel {
    display: none;
  }

  .disp {
    display: block;
  }

  .barnav {
    display: block;
    font-size: 22px;
    background-color: $white;
    background: linear-gradient(to right, $bluelight, $blue 90%);
    width: 100%;
    position: fixed;
    top: 12vh;
    height: 6vh;
    z-index: 1;

    a {
      color: $white;
      text-decoration: none;
      font-weight: 300;

      &:hover {
        color: $bluelight;
      }
    }
  }

  .searchbardesktop {
    display: block;

    input {
      &:hover {
        border: 3px solid $bluelight;
      }

      &:focus {
        border: 3px solid $bluelight;
      }

      border: 2px solid $bluelight;
      border-radius: 8px;
      outline: none;
      width: 50vh;
    }

    .header-right {
      margin-right: 200px;
    }
  }
}
</style>
