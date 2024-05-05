<template>
  <div class="Login d-flex justify-content-center align-items-center">
    <div class="LoginImage"></div>
    <div class="LoginBox ">
      <div class="d-flex justify-content-center">
        <img src="@/assets/PowerLab.jpg" alt="" v-on:click="inicio">
      </div>
      <div class="d-flex flex-column loginput">
        <form method="post" id="logform" @submit.prevent="logvalidator">
          <div class="Logincontainer">
          </div>
          <div class="Logincontainer mb-4">
            <p class="ms-4">Email</p>
            <input type="email" id="logemail" class="" v-model="UserData.gmail">
          </div>
          <div class="Logincontainer mb-4">
            <p class="ms-4">Password</p>
            <input type="password" id="logpass" v-model="UserData.password">
          </div>
          <div class="d-flex justify-content-center mt-3 flex-column align-items-center">
            <button type="submit" class="w-25 mt-2">Login</button>
            <div id="danger" class="text-center mt-4">
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      UserData:{
        gmail:'',
        password:''
      }
    }
  },
  methods: {
   async logvalidator(e) {
      let email = document.getElementById("logemail").value;
      let password = document.getElementById("logpass").value;
      let danger=document.getElementById("danger");
      const emaillogex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      danger.textContent="";
      if ( email == "" || password == "") {
        e.preventDefault();
        danger.textContent+="Algun Campo Vacio";
      }else if(!emaillogex.test(email)){
        e.preventDefault()
        danger.textContent="Email Incorrecto";
      }else{
        //LOGICA DE BACKEND DE login
        const respuesta=await axios.post('http://127.0.0.1:8000/api/login',this.UserData);
        if(respuesta.data == ""){
          let danger=document.getElementById("danger")
          danger.textContent="Email o Contraseña Incorrectos"
        }else{
          this.$store.commit('setUsuarioLogueado', true);
          this.$store.commit('setUserName', respuesta.data.usu);
          this.$store.commit('setId',respuesta.data.id)
          this.$router.push("/");
        }
        
      }
    },
    inicio(){
      this.$router.push('/')
    }
  },
};
</script>

<style lang="scss" scoped>
* {
  margin: 0
}

@import "../../Style/variables.scss";

.Logincontainer {
  margin-bottom: 15px;

  p {
    margin-bottom: 5px;
  }
}
#danger{
  color: red;
}
.Login {
  position: relative;
  height: 100vh;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.loginput {
  input {
    width: 85%;
    margin-left: 20px;
    border-radius:8px;
    padding: 5px;
  }

}

.LoginImage {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-image: url('@/assets/tienda.png');
  background-size: cover;
  background-position: center;
  filter: brightness(30%) contrast(100%) saturate(100%);
  z-index: -1;
}
.LoginBox {
  img {
    width: 15vh;
    height: 15vh;
  }
  color: $white;
  z-index: 1000;
  width: 38vh;
  height: 58vh;
  border-radius: 32px;
  background: linear-gradient(to bottom right , $grey, $black 40%, $black 80%,$grey 100%,);
}

button {
  border: none;
  padding: 8px;
  padding-left: 16px;
  padding-right: 16px;
  background-color: $black;
  border: 1px solid $bluelight;
  color: $bluelight;
  border-radius: 6px;
  &:hover {
    background-color: $bluelight;
    color: $white;
  }
}
@media only screen and (min-width: 800px) {
  .LoginBox {
    width: 45vh;
    height: 55vh;
  }
}</style>
