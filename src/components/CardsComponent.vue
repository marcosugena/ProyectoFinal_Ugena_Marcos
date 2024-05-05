<template>
    <div class="Patrocinadores d-lg-flex justify-content-around align-items-center flex-row">     
            <div class="card">
                <div class="card-face card-front"><img src="@/assets/amix.jpg" alt=""></div>
                <div class="card-face card-back">
                    <p>Amix Para deportistas que quieran mejorar su rendimiento deportivo y cuidar su salud.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-face card-front"><img src="@/assets/big.jpg" alt=""></div>
                <div class="card-face card-back">
                    <p>Big Amplia variedad de productos para moldear tu cuerpo.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-face card-front"><img src="@/assets/usa.jpg" alt=""></div>
                <div class="card-face card-back">
                    <p>Descubre en BiotechUSA una gama completa de productos para esculpir tu cuerpo y alcanzar tus
                        metas de bienestar físico</p>
                </div>
            </div>
            <div class="card">
                <div class="card-face card-front"><img src="@/assets/LifePro.jpg" alt=""></div>
                <div class="card-face card-back">
                    <p>Descubre en LifePro una gama completa de productos para esculpir tu cuerpo y alcanzar tus
                        metas de bienestar físico</p>
                </div>
            </div>
            <div class="card">
                <div class="card-face card-front"><img src="@/assets/hsn.jpg" alt=""></div>
                <div class="card-face card-back">
                    <p>Con HSN, descubre una amplia gama de productos para esculpir tu cuerpo y lograr tus objetivos
                        de bienestar físico.</p>
                </div>
            </div>
            <div class="card d-lg-none">
                <div class="card-face card-front"><img src="@/assets/biocop.jpg" alt=""></div>
                <div class="card-face card-back">
                    <p>Con Biocop, descubre productos biológicos que nutren tu cuerpo y contribuyen a un bienestar
                        equilibrado de manera sostenible</p>
                </div>
        </div>
        
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";
.Patrocinadores {
    background: linear-gradient(to bottom right , $grey, $black 50%);
    height: 70vh;
    width: 100%;
    display: grid;
    grid-template-columns: repeat(2, 1fr); 
    justify-content: center;
    align-items: center;
 
    h1 {
        text-align: center;
        color: $black;
    }
}
.card-container {
    justify-content: center;
    margin: 20px;
}
.card {
    width:15vh;
    height:15vh;
    transform-style: preserve-3d;
    transition: transform 0.8s;
    cursor: pointer;
    margin-left: 9vw;

    p {
        font-size: 12px;
        margin: 10px;
        text-align: center;
    }

    img {
        width:15vh;
        height:15vh;
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
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.7);
    background-color: $white;
}

.card-back {
    background-color: $black;
    transform: rotateY(180deg);
}


@media only screen and (min-width: 800px) {
    .Patrocinadores{
        height: 30vh;
        
    }
    .card{
        margin-left: 0;
        width:20vh;
        height:18vh;
        img{
            width:20vh;
            height:18vh;
        }
    }
}

</style>