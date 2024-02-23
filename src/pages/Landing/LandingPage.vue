<template>
    <HeaderComponent></HeaderComponent>
    <div class="landing">
        <SliderComponent></SliderComponent>
        <div class="Patrocinadores">
            <h1 class="pt-3">Patrocinadores Oficiales de PowerLab</h1>
            <div class="card-container">
                <div class="card">
                    <div class="card-face card-front"><img src="../../assets/amix.jpg" alt=""></div>
                    <div class="card-face card-back"><p>Amix Para deportistas que quieran mejorar su rendimiento deportivo y cuidar su salud.</p></div>
                </div>
                <div class="card">
                    <div class="card-face card-front"><img src="../../assets/big.jpg" alt=""></div>
                    <div class="card-face card-back"><p>Big Amplia variedad de productos para moldear tu cuerpo.</p></div>
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
export default {
    components: {
        HeaderComponent,
        FooterComponent,
        SliderComponent,
    },
    data() {
        return {};
    },
    methods: {},
};
</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";
.Patrocinadores{
    background-color: $blue;
    height: 73vh;
    width: 100%;
    h1{
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
    margin-left: 3vh;
}

.card {
    width: 15vh;
    height: 15vh;
    transform-style: preserve-3d;
    transition: transform 0.8s;
    cursor: pointer;
    margin-right: 3vh;
    p{
        font-size: 9.2px;
        margin: 10px;
        text-align: center;
    }
    img{
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

@media only screen and (min-width: 1500px) {
    .landing {
        margin-top: 17vh;
    }
    .card {
    width: 20vh;
    height: 20vh;
    p{
        font-size: 16px;
    }
    img{
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
    margin-left: 26vh;
    margin-top: 50px;
}
.Patrocinadores{
    height: 40vh;
}
}
@media only screen and (min-width: 704px) and (max-width: 1500px) {
    .Patrocinadores{
    height: 45vh;
    }
}

</style>