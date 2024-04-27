<template>
    <HeaderComponent></HeaderComponent>
    <div class="ShoppingCart">
        <ul class="carrocontainer">
            <LiPaymentComponent></LiPaymentComponent>
        </ul>
    </div>
    <FooterComponent></FooterComponent>
</template>

<script>
import HeaderComponent from "../../components/HeaderComponent.vue"
import FooterComponent from "../../components/FooterComponent.vue"
import LiPaymentComponent from "../../components/LiPaymentComponent.vue"
export default {
    data() {
        return {
            price: 0
        }
    },
    mounted() {
        console.log(this.$route.params.precio)
        console.log(this.$store.getters.carrito)

        
        this.$store.dispatch('decrypt', this.$route.params.precio)
            .then(dehashedPrecio => {
                console.log(dehashedPrecio)
            })
            .catch(error => {
                console.error('Error al encriptar el precio:', error);
            });
    },
    components: {
        HeaderComponent,
        LiPaymentComponent,
        FooterComponent
    }
}

</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";

.ShoppingCart {
    margin-top: 18vh;
    background-color: $black;
    height: 100vw;
    padding: 60px;
}

.carrocontainer {
    background: linear-gradient(to bottom right, $grey, $bluelight 40%, $bluelight 40%, $grey 100%, );
    height: 40vw;
    margin-left: 10%;
    margin-right: 10%;
    border-radius: 2px;
    padding: 80px;
}
</style>