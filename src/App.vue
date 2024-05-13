<template>
  <div id="app">
    <div v-if="loading" class="loading-overlay">
      <div class="spinner"></div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      loading: true,
    };
  },
  mounted() {
    setTimeout(() => {
      this.loading = false;
    }, 1000);
  },
};
</script>

<style lang="scss">
@import "./Style/variables.scss";

* {
  margin: 0;
  padding: 0;
  font-family: "Poppins";
  input {
    border: none;
  }
  input:focus {
    outline: none;
    border: none;
  }
}
.loading-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999; /* Asegura que esté por encima de otros elementos */
}

/* Estilos del spinner */
.spinner {
  border: 4px solid #f3f3f3; /* Gris claro */
  border-top: 4px solid #3498db; /* Azul */
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 1s linear infinite; /* Animación del spinner */
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
