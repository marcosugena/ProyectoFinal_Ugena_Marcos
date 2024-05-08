<template>
<div id="app">
 <router-view></router-view>
</div>
</template>

<script>


export default {
  name: 'App',
}
</script>
<style lang="scss">
@import "./Style/variables.scss";
*{
    margin: 0;
    padding: 0;
    font-family: "Poppins";
    input{
      border: none;
    }
    input:focus{
      outline: none;
      border: none;
  }
}
</style>

