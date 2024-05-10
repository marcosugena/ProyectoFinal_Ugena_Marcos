<template>
    <HeaderComponent></HeaderComponent>

    <ul class="carrocontainer d-flex flex-column w-100">
        <div v-for="ca in car" :key="ca.id" class="licontainer">
            <LiPaymentComponent :imgurl="ca.ImagenProducto" :name="ca.Nombre" :cantidad="ca.Cantidad"
                :precio="ca.Precio"></LiPaymentComponent>
        </div>
        <p class="text-lg-end text-center w-100 pricetotal fs-5 px-lg-4 pt-lg-5 p-5 ">Precio total: {{ price }}€</p>
        <div class="w-lg-100 d-flex justify-content-center p-5 btndiv"><button class=" ">Finalizar Compra</button></div>
    </ul>
    <FooterComponent></FooterComponent>
</template>
<script>
import HeaderComponent from "../../components/HeaderComponent.vue"
import FooterComponent from "../../components/FooterComponent.vue"
import LiPaymentComponent from "../../components/LiPaymentComponent.vue"
export default {
    data() {
        return {
            price: 0,
            car: []
        }
    },
    mounted() {
        this.car = this.$store.getters.carrito;
        this.refreshprice()
    },
    components: {
        HeaderComponent,
        LiPaymentComponent,
        FooterComponent
    },
    methods: {
        refresh() {
            this.car = this.$store.getters.carrito;
        },
        refreshprice() {
            const carrito = this.$store.getters.carrito;
            let precio = 0;
            carrito.forEach(pr => {
                precio += pr.Precio * pr.Cantidad;
                this.price = precio.toFixed(2);
            });
        }
    },
    watch: {
        '$store.getters.carrito': {
            handler() {
                this.refresh();
                this.refreshprice();
                if (this.$store.getters.carrito.length == 0) {
                    this.$router.push('/')
                }
            },
            deep: true
        }

    }
}


</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";

* {
    margin: 0;
    padding: 0;
}


.ShoppingCart {
    background-color: $black;
    height: auto;
    width: 100%;
    padding: 60px;
}

p {
    text-wrap: nowrap;
}

.carrocontainer {
    height: auto;
    border-radius: 2px;
    width: 100%;
    margin: 0;
    .licontainer{
        border-top: 2px solid $white;
        border-left: 2px solid $white;
        border-right: 2px solid $white;
        }
    p {
        background-color: $black;
        color: $bluelight;
        padding: 5px;
    }

    div {
        color: $white;
        font-size: larger;
        button {
            background-color: $bluelight;
            color: $white;           
            padding: 10px;
            border-radius: 6px;
            border: none;

            &:hover {
                background-color: $blue;
            }
        }
    }
}
.btndiv {
            color: $white;
            font-size: x-large;
            background-color: $black;

            button {
                background-color: $bluelight;
                color: $white;
                padding: 10px;
                border-radius: 6px;
                border: 2px solid $white;    

                &:hover {
                    background-color: $blue;
                }
            }
        }
        .pricetotal {
        border-top:2px solid $white ;
        font-size: x-large;
    }

@media only screen and (min-width: 850px) {
    .pricetotal {
        border-top:2px solid $white ;
        font-size: x-large;
    }
    .ShoppingCart {
        background-color: $black;
        height: auto;
        width: 100%;
        padding: 60px;
    }

    .carrocontainer {
        background: linear-gradient(to bottom right, $grey, $bluelight 40%, $bluelight 40%, $grey 100%, );
        height: auto;
        border-radius: 2px;
        padding: 80px;
        .licontainer{
        border-top: 2px solid $white;
        border-left: 2px solid $white;
        border-right: 2px solid $white;
        }
        p {
            background-color: $black;
            color: $white;
            padding: 5px;
        }

        div {
            font-size: xx-large;

        }

        .btndiv {
            color: $white;
            font-size: x-large;
            background-color: $black;

            button {
                background-color: $bluelight;
                color: $white;
                padding: 10px;
                border-radius: 6px;
                border: 2px solid $white;    

                &:hover {
                    background-color: $blue;
                }
            }
        }
    }
}
</style>