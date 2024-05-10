<template>
    <HeaderComponent></HeaderComponent>
    <div class="landing">
        <SliderComponent></SliderComponent>
        
        <OfferComponent :imageUrl="'/banner1.jpg'"></OfferComponent>
        
        <div class="Recommendforyou">
            <h2 class="pt-2">RECOMENDADO PARA TI</h2>
            <div class="ProductContainer ">
                <div v-for="producto in Recomendados" :key="producto.id">
                    <ProductComponent :price="producto.Precio" :imageURL="producto.ImagenProducto"
                        :nameproduct="producto.Nombre" :ProductId="producto.ProductId"></ProductComponent>
                </div>
            </div>
        </div>
        <BorderComponent></BorderComponent>
        <OfferComponent :imageUrl="'/banner2.jpg'" @click="MostrarProducto2(2)"></OfferComponent>
        <BorderComponent></BorderComponent>
        <div class="Landingvideo d-none d-lg-block">
            <video muted autoplay loop playsinline class="m-0">
                <source src="@/assets/videocortado.mp4" type="video/mp4">
            </video>
            <div class="videotext w-75">
                <h6>OUR PHILOSOPHY</h6>
                <h2>FROM THE GROUND UP</h2>
                <h4>POWERLAB</h4>
            </div>
        </div>
        

        <div class="LandingInfo d-flex align-items-center flex-wrap">
            <div class="infocontainer d-flex flex-column align-items-center">
                <img src="@/assets/transporte.png" alt="">
                <span>ENVÍOS GRATIS Y RÁPIDOS</span>
                <p class="text-center">
                    Envío rapidísimo en 24/48 horas y gratis a partir de 24,90€
                </p>
            </div>
            <div class="infocontainer d-flex flex-column align-items-center">
                <img src="@/assets/alta-calidad.png" alt="">
                <span>MÁXIMA CALIDAD</span>
                <p class="text-center">
                    Desarrollado por nuestro equipo de I+D+I y fabricado en nuestra propia fábrica
                </p>
            </div>
            <div class="infocontainer d-flex flex-column align-items-center">
                <img src="@/assets/sostenibilidad.png" alt="">
                <span>SOSTENIBILIDAD</span>
                <p class="text-center">
                    Optimizamos procesos para reducir nuestra huella ecológica.
                </p>
            </div>
            <div class="infocontainer d-flex flex-column align-items-center">
                <img src="@/assets/organico.png" alt="">
                <span>MATERIAS PRIMAS PREMIUM</span>
                <p class="text-center">
                    Utilizamos materias primas de calidad certificada y probada
                </p>
            </div>
        </div>

        <PaymentSend></PaymentSend>
        <CardsComponent></CardsComponent>
    </div>
    <NewsLetterComponent></NewsLetterComponent>
    <FooterComponent></FooterComponent>
</template>
<script>
import axios from 'axios';
import HeaderComponent from "@/components/HeaderComponent.vue";
import FooterComponent from "@/components/FooterComponent.vue";
import SliderComponent from "@/components/SliderComponent.vue";
import OfferComponent from "@/components/OfferComponent.vue";
import ProductComponent from "@/components/ProductComponent.vue";
import NewsLetterComponent from "@/components/NewsLetterComponent.vue";
import PaymentSend from "@/components/PaymentSend.vue";
import CardsComponent from '@/components/CardsComponent.vue';
import BorderComponent from '@/components/BorderComponent.vue';
export default {
    components: {
        HeaderComponent,
        FooterComponent,
        SliderComponent,
        ProductComponent,
        OfferComponent,
        NewsLetterComponent,
        PaymentSend,
        CardsComponent,
        BorderComponent
    },
    data() {
        return {
            Recomendados: []
        };
    },
    methods: {
        async cogerecomend() {
            try {
                const response = await axios.get("http://127.0.0.1:8000/productosrecomendados")
                this.Recomendados = response.data.recomendados;
            } catch (error) {
                console.error('Error al obtener productos:', error);
            }

        },
        MostrarProducto(ProductId) {
            this.$router.push({ name: 'ProductView', params: { id: ProductId } });
        },
        MostrarProducto2(ProductId) {
            this.$store.dispatch('encrypt', ProductId.toString())
                .then(hashedid => {
                    this.$router.push({ name: 'ProductView', params: { id: hashedid } });
                })
                .catch(error => {
                    console.error('Error al encriptar el precio:', error);
                });
        }
    },
    mounted() {
        this.cogerecomend();
    },

};
</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";

.Landingvideo {
    position: relative;
    background-color: lighten($grey, 0%);

    video {
        width: 100%;
        height: 58vh;
        object-fit: cover;
        cursor: none;
        filter: brightness(20%) contrast(90%) saturate(80%);
    }

    .videotext {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        font-family: "Roboto", "Open Sans", sans-serif;

        h6 {
            font-weight: 400;
        }

        h2 {
            font-size: 74px;
            font-family: Helvetica, Helvetica Neue, Arial, Lucida Grande, sans-serif;
            font-weight: 700;
        }

        h4 {
            font-weight: 700;
        }

    }
}

.LandingInfo {
    flex-wrap: wrap;

}

.infocontainer {
    width: 100%;

    span {
        text-transform: uppercase;
        font-size: 1.2em;
        text-decoration: none;
        min-height: 2em;
        color: inherit;
    }

    p {
        width: 60%;
    }
}



.landing {
    padding: 0;
}



.Recommendforyou {

    background: linear-gradient(to bottom right, $grey, $black 40%, $black 50%, $grey 100%, );
    color: $white;

    .ProductContainer {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0px;
    }

    h2 {
        text-align: center;
        font-weight: 700;
    }
}

.LandingInfo {
    height: 120vh;
    background: linear-gradient(to bottom, $grey, $black 8%, $black 92%, $grey 100%, );

    color: $white;
}

//MEDIAQUERYS
@media only screen and (min-width: 800px) {
    .Recommendforyou {
        height: 105vh;
        background-color: $black;
        color: $white;


        .ProductContainer {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0px;
        }

        h2 {
            text-align: center;

        }
    }

    .LandingInfo {
        height: 40vh;
        width: 100%;
        background-color: lighten($grey, 0%);
    }

    .infocontainer {
        width: 25%;

        span {
            text-transform: uppercase;
            font-size: 1.2em;
            text-decoration: none;
            min-height: 2em;
            color: inherit;
        }

        p {
            width: 60%;
        }
    }
}
</style>