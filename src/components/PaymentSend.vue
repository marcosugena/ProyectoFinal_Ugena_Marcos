<template>
    <div class="paysend p-5">
        <div class="paytext ">
            <h1>Tienda Online de Nutrición Deportiva, Dietética Natural y Accesorios</h1>
            <p class=" mb-5">
                ¿Eres un entusiasta del deporte y buscas alcanzar tu mejor versión? ¿Te esfuerzas por
                llevar un estilo de
                vida saludable o quieres empezar? ¡Entonces estás en el lugar adecuado! En PowerLab, te unirás a una
                comunidad de miles de clientes satisfechos. Descubrirás cómo nos esforzamos para acercarte a tus metas
                día a día.
            </p>
            <p>
                Somos la principal tienda online especializada en Nutrición Deportiva y Dietética Natural. Aquí, tú eres
                nuestra prioridad. En PowerLab, encontrarás un equipo con el que te sentirás identificado, ya que
                nuestra dedicación por alcanzar la excelencia no conoce límites.
            </p>

            <h1>¿Quienes Somos Y Que Podemos Aportarte?</h1>
            <p class="mb-4">Con más de una década de experiencia a tu servicio, impulsados por la búsqueda constante de
                la
                excelencia, te ofrecemos la mejor selección de productos de nutrición deportiva y alimentación saludable
                del mercado, sin importar tu disciplina deportiva u objetivo.
                Te invitamos a descubrir las virtudes de nuestros productos: eficacia, delicioso sabor y textura, desde
                nuestras proteínas líderes (como Whey Protein), creatinas, hasta aminoácidos de alta calidad como BCAA's
                y productos orgánicos.
            </p>
            <p>
                ¡Todo enfocado en promover un interés incesante por el cuidado de la salud!
                Nuestro objetivo es llevar la Marca PowerLab al más alto nivel, ofreciendo la mayor variedad de
                productos de Nutrición Deportiva y Dietética Natural, siempre con los mejores precios.
                En PowerLab diseñamos, creamos y seleccionamos los mejores suplementos y alimentos naturales para
                ayudarte a alcanzar tus objetivos deportivos y llevar una vida más saludable
            </p>
        </div>

        <div class="payment d-lg-flex justify-content-end pr-lg-3 mx-4 mt-5">
            <div><img src="@/assets/mastercard.png" alt=""></div>
            <div><img src="@/assets/visa.png" alt=""></div>
            <div><img src="@/assets/paypal.png" alt=""></div>
            <div><img src="@/assets/bizum.png" alt=""></div>
            <div><img src="@/assets/amazonpay.png" alt=""></div>
            <div> <img src="@/assets/sequra.png" alt=""></div>
        </div>
        <div class="sender d-lg-flex justify-content-end mt-2 pr-lg-3 mx-4">
            <div><img src="@/assets/correos.png" alt=""></div>
            <div> <img src="@/assets/correosexpress.png" alt=""></div>
            <div><img src="@/assets/dhl.png" alt=""></div>
            <div><img src="@/assets/fedex.png" alt=""></div>
            <div> <img src="@/assets/gls.png" alt=""></div>
            <div> <img src="@/assets/ups.png" alt=""></div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";

.paytext {
    h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: $bluelight;
        font-weight: 800;

        &:nth-of-type(2) {
            color: #333;
        }
    }

    p {
        font-size: 16px;
        text-wrap: wrap;

    }
}

h3 {
    color: $black;
    font-family: 'Rubik';
}

.paysend {
    background-color: $grey;
    height: auto;

}

.payment {
    gap: 6px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);

    img {
        width: 8vh;
        height: 6vh;
    }
}

.sender {
    gap: 6px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);

    img {
        width: 8vh;
        height: 6vh;
    }
}

@media only screen and (min-width: 800px) {
    h3 {
        color: $black;
        font-family: 'Rubik';
    }

    .paysend {
        background-color: $grey;
        height: auto;
    }

    .payment {

        img {
            width: 5.5vh;
            height: 3vh;
        }
    }

    .sender {

        img {
            width: 5.5vh;
            height: 3vh;
        }
    }
}
</style>