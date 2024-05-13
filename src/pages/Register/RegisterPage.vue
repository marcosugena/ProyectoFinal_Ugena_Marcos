<template>
  <div class="Register d-flex justify-content-center align-items-center">
    <div class="RegisterImage"></div>
    <div class="RegisterBox">
      <div class="d-flex justify-content-center">
        <img src="@/assets/PowerLab.jpg" alt="" v-on:click="inicio" />
      </div>
      <div class="d-flex flex-column reginput">
        <form method="post" id="regform" @submit.prevent="regvalidator">
          <div class="registercontainer">
            <p class="ms-4">UserName</p>
            <input type="text" id="regusu" v-model="userData.username" />
          </div>
          <div class="registercontainer">
            <p class="ms-4">Email</p>
            <input type="email" id="regemail" v-model="userData.email" />
          </div>
          <div class="registercontainer">
            <p class="ms-4">Password</p>
            <input type="password" id="regpass" v-model="userData.password" />
          </div>
          <div
            class="d-flex justify-content-center mt-3 flex-column align-items-center"
          >
            <button type="submit" class="w-50 mt-2">Register</button>
            <div id="danger" class="text-center mt-4"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      userData: {
        username: "",
        email: "",
        password: "",
      },
    };
  },
  methods: {
    async regvalidator(e) {
      //VALIDACION DE DATOS
      let usuario = document.getElementById("regusu").value;
      let email = document.getElementById("regemail").value;
      let password = document.getElementById("regpass").value;
      let danger = document.getElementById("danger");
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const usuregex = /[A-Z]/;
      danger.textContent = "";
      if (usuario == "" || email == "" || password == "") {
        e.preventDefault();
        danger.textContent += "Algun Campo Vacio";
      } else if (!emailRegex.test(email)) {
        e.preventDefault();
        danger.textContent = "Email Incorrecto";
      } else if (!usuregex.test(usuario)) {
        danger.textContent = "Introduce una mayuscula en el UserName";
        e.preventDefault();
      } else {
        //LOGICA DE BACKEND DE REGISTRO
        try {
          const respuesta = await axios.post(
            this.$store.getters.backurl + "/api/register",
            this.userData
          );
          // Manejar la respuesta como desees
          if (respuesta.data.success) {
            this.$router.push("/");
          } else {
            let danger = document.getElementById("danger");
            danger.textContent = "Este correo ya esta registrado";
          }
        } catch (error) {
          console.error("Error al registrar usuario" + error);
        }
      }
    },
    inicio() {
      this.$router.push("/");
    },
  },
};
</script>

<style lang="scss" scoped>
* {
  margin: 0;
}

@import "../../Style/variables.scss";

.registercontainer {
  margin-bottom: 15px;

  p {
    margin-bottom: 5px;
  }
}

#danger {
  color: red;
}

.Register {
  position: relative;
  height: 100vh;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.reginput {
  input {
    width: 85%;
    margin-left: 20px;
    border-radius: 8px;
    padding: 5px;
  }
}

.RegisterImage {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-image: url("@/assets/tienda.png");
  background-size: cover;
  background-position: center;
  filter: brightness(30%) contrast(100%) saturate(100%);
  z-index: -1;
}

.RegisterBox {
  img {
    width: 15vh;
    height: 15vh;
  }

  color: $white;
  z-index: 1000;
  width: 38vh;
  height: auto;
  border-radius: 32px;
  background: linear-gradient(
    to bottom right,
    $grey,
    $black 40%,
    $black 80%,
    $grey 100%
  );
}

button {
  border: none;
  padding: 8px;
  padding-left: 16px;
  padding-right: 16px;
  background-color: $black;
  border: 1px solid $bluelight;
  color: $bluelight;
  border-radius: 3px;

  &:hover {
    background-color: $bluelight;
    color: $white;
  }
}

@media only screen and (min-width: 800px) {
  .RegisterBox {
    width: 45vh;
    height: auto;
  }
}
</style>
