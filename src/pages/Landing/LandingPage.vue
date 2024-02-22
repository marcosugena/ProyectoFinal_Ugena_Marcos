<template>
    <HeaderComponent></HeaderComponent>
    <div class="landing">       
        <h1>Landing</h1>
        <router-link to="/detail">AQUI</router-link>    
    </div>
    <FooterComponent></FooterComponent>
</template>
<script>
    import HeaderComponent from '../../components/HeaderComponent.vue'
    import FooterComponent from '../../components/FooterComponent.vue'

    export default {
        components:{
            HeaderComponent,FooterComponent
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
     padding: 0;
   }
   @media only screen and (min-width: 768px) {
    .landing{
    margin-top: 17vh;
   }
   }
</style>