<template>
    <HeaderComponent></HeaderComponent>
    <div class="landing">
        <SliderComponent></SliderComponent>
        <div class="Patrocinadores">
            <h1 class="pt-3">Patrocinadores Oficiales de PowerLab</h1>
            <div class="card-container">
                <div class="card">
                    <div class="card-face card-front"><img src="../../assets/amix.jpg" alt=""></div>
                    <div class="card-face card-back">
                        <p>Amix Para deportistas que quieran mejorar su rendimiento deportivo y cuidar su salud.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-face card-front"><img src="../../assets/big.jpg" alt=""></div>
                    <div class="card-face card-back">
                        <p>Big Amplia variedad de productos para moldear tu cuerpo.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-face card-front"><img src="../../assets/usa.jpg" alt=""></div>
                    <div class="card-face card-back">Back</div>
                </div>
                <div class="card">
                    <div class="card-face card-front"><img src="../../assets/LifePro.jpg" alt=""></div>
                    <div class="card-face card-back">Back</div>
                </div>
                <div class="card">
                    <div class="card-face card-front"><img src="../../assets/hsn.jpg" alt=""></div>
                    <div class="card-face card-back">Back</div>
                </div>
                <div class="card d-lg-none">
                    <div class="card-face card-front"><img src="../../assets/biocop.jpg" alt=""></div>
                    <div class="card-face card-back">Back</div>
                </div>
            </div>
        </div>
        <div class="Recommendforyou">
            <h2 class="pt-4">Recomendado para ti</h2>
            <div class="ProductContainer ">
                <ProductComponent></ProductComponent>
                <ProductComponent></ProductComponent>
                <ProductComponent></ProductComponent>
                <ProductComponent></ProductComponent>
                <ProductComponent></ProductComponent>
                <ProductComponent></ProductComponent>
            </div>
        </div>
        <div class="Landingvideo">

        </div>
        <div class="LandingInfo d-flex align-items-center flex-wrap">
            <div class="infocontainer d-flex flex-column align-items-center">
                <img src="../../assets/transporte.png" alt="">
                <span>ENVÍOS GRATIS Y RÁPIDOS</span>
                <p>
                    Envío rapidísimo en 24/48 horas y gratis a partir de 24,90€
                </p>
            </div>
            <div class="infocontainer d-flex flex-column align-items-center">
                <img src="../../assets/alta-calidad.png" alt="">
                <span>MÁXIMA CALIDAD</span>
                <p>
                    Desarrollado por nuestro equipo de I+D+I y fabricado en nuestra propia fábrica
                </p>
            </div>
            <div class="infocontainer d-flex flex-column align-items-center">
                <img src="../../assets/sostenibilidad.png" alt="">
                <span>SOSTENIBILIDAD</span>
                <p>
                    Mejoramos progresivamente los procesos existentes para reducir nuestra huella medioambiental
                </p>
            </div>
            <div class="infocontainer d-flex flex-column align-items-center">
                <img src="../../assets/organico.png" alt="">
                <span>MATERIAS PRIMAS PREMIUM</span>
                <p>
                    Utilizamos las mejores materias primas probadas y reconocidas por certificados de calidad
                </p>
            </div>
        </div>
        <h1>Landing</h1>
        <router-link to="/detail">AQUI</router-link>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    </div>
    <FooterComponent></FooterComponent>
</template>
<script>
import HeaderComponent from "../../components/HeaderComponent.vue";
import FooterComponent from "../../components/FooterComponent.vue";
import SliderComponent from "../../components/SliderComponent.vue";
import ProductComponent from "../../components/ProductComponent.vue";
export default {
    components: {
        HeaderComponent,
        FooterComponent,
        SliderComponent,
        ProductComponent
    },
    data() {
        return {};
    },
    methods: {},
};
</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";
.LandingInfo{
 flex-wrap: wrap;

}
.infocontainer {
    span {
        text-transform: uppercase;
        font-size: 1.2em;
        text-decoration: none;
        min-height: 2em;
        color: inherit;
    }
    p{
        width: 60%;
    }
}

.Patrocinadores {
    background-color: $blue;
    height: 73vh;
    width: 100%;

    h1 {
        text-align: center;
        color: $white;
    }
}

.landing {
    margin-top: 12vh;
    padding: 0;
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(14vh, 1fr));
    gap: 5vh;
    justify-content: center;
    margin: 20px;
    margin-left: 5vh;
}

.card {
    width: 15vh;
    height: 15vh;
    transform-style: preserve-3d;
    transition: transform 0.8s;
    cursor: pointer;
    margin-right: 3vh;

    p {
        font-size: 9.2px;
        margin: 10px;
        text-align: center;
    }

    img {
        width: 15vh;
        height: 15vh;
        border-radius: 8px;
    }
}

.card:hover {
    transform: rotateY(180deg);
}

.card-face {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    font-weight: bold;
    color: $white;
    border-radius: 8px;
}

.card-front {
    background-color: $white;
}

.card-back {
    background-color: $black;
    transform: rotateY(180deg);
}

.Recommendforyou {
    height: 135vh;
    background-color: $black;
    color: $white;

    .ProductContainer {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0px;
    }

    h2 {
        text-align: center;

    }
}

.LandingInfo {
    height: 100vh;
    background-color: lighten($grey, 0%);
}

//MEDIAQUERYS
@media only screen and (min-width: 800px) {
    .Recommendforyou {
        height: 100vh;
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
    height: 30vh;
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
    p{
        width: 60%;
    }
}
}

@media only screen and (min-width: 1500px) {
    .landing {
        margin-top: 17vh;
    }

    .card {
        width: 20vh;
        height: 20vh;

        p {
            font-size: 16px;
        }

        img {
            width: 22vh;
            height: 20vh;
        }
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(22vh, 2fr));
        gap: 5vh;
        justify-content: center;
        margin: 20px;
        margin-left: 33vh;
        margin-top: 50px;
    }

    .Patrocinadores {
        height: 40vh;
    }
}

@media only screen and (min-width: 704px) and (max-width: 1500px) {
    .Patrocinadores {
        height: 45vh;
    }
}</style>