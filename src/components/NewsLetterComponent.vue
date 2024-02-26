<template>
  <div class="NewsLetter d-flex align-items-center flex-column ">
    <form @submit.prevent="formchecker">
      <div class="newlettertext">
        <h2 class="text-center mt-3 mt-lg-5">REGÍSTRATE EN NUESTRA NEWSLETTER</h2>
        <p class="text-center">Mantente al día sobre los mejores productos y las mejores ofertas del mercado.</p>
      </div>
      <div class="newform d-flex justify-content-center flex-column align-items-center ">
        <input type="text" placeholder="Email" id="formemailnew" :class="{ 'form-control': true, 'is-invalid': !emailvalid || !checkboxvalid}" >
        <p class="mt-3"><input type="checkbox" class="mx-1" id="checkboxnew">Acepto la política de privacidad </p>
        <button type="submit">SUSCRÍBITE</button>
      </div>
      <div class="invalidemail text-center mt-1" id="emailerror" :style="{ display: emailvalid ? 'none' : 'block' }">
        Por favor, ingresa un correo electrónico válido.
      </div>
      <div class="invalidcheckbox text-center mt-1" id="checkboxerror" :style="{ display: checkboxvalid ? 'none' : 'block' }">
        Por favor, acepta la política de privacidad.
      </div>
      <div v-if="formSubmitted" class="success-message text-center mt-2">
        ¡Formulario enviado con éxito!
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      emailvalid: true,
      checkboxvalid: true,
      formSubmitted: false,
    };
  },
  methods: {
    formchecker() {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const emailusu = document.getElementById("formemailnew").value;
      const checkbox = document.getElementById("checkboxnew").checked;
      if (emailRegex.test(emailusu) && checkbox) {
        this.formSubmitted = true;
      } else {
        this.formSubmitted = false;

        if (!emailRegex.test(emailusu)) {
          this.emailvalid = false;
        } else {
          this.emailvalid = true;
        }
        if (!checkbox) {
          this.checkboxvalid = false;
        } else {
          this.checkboxvalid = true;
        }
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";

.NewsLetter {
    background-color: $black;
    height: 40vh;
    width: 100%;
    color: $white;
    font-family: "Futura Bold Italic", sans-serif;

    display: flex;
    align-items: center;
    flex-direction: column;
}
.invalidemail,.invalidcheckbox{
    color: red;
}
.success-message{
    color: $bluelight;
}

.newform {
    input[type="text"] {
        width: 35vh;
        padding: 8px;
        border-radius: 16px;
        border: none;

        &:focus {
            outline: none;
            border: none;
        }
    }

    button {
        background-color: red;
        border: none;
        color: $white;
        padding: 7px;
        width: 70%;
        border-radius: 32px;
    }
}

@media only screen and (min-width: 800px) {
    .newform {
    input[type="text"] {
        width: 50vh;
        padding: 8px;
        border-radius: 16px;
        border: none;

        &:focus {
            outline: none;
            border: none;
        }
    }

    button {
        background-color: red;
        border: none;
        color: $white;
        padding: 7px;
        width: 50%;
        border-radius: 32px;
    }
}
}
</style>
