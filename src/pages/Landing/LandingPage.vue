<template>

    <div class="landing">
         <HeaderComponent></HeaderComponent>
        <h1>Landing</h1>
        <router-link to="/detail">AQUI</router-link>
        
    </div>
</template>

<script>
    import HeaderComponent from '../../components/HeaderComponent.vue'
    export default {
        components:{
            HeaderComponent 
        },
       data() {
        return {
            
        }
       },
       methods: {
        
       },
    }
</script>

<style lang="scss" scoped>
   .landing{
    margin-top: 12vh;
    
   }
</style>