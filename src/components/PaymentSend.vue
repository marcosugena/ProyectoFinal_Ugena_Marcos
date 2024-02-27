<template>
    <div class="paysend">
        <h3 class="text-center pt-3">Metodos de pago</h3>
        <div class="payment ms-3 ms-lg-5 mt-lg-3">
            <img src="../assets/mastercard.png" alt="">
            <img src="../assets/visa.png" alt="">
            <img src="../assets/paypal.png" alt="">
            <img src="../assets/bizum.png" alt="">
            <img src="../assets/amazonpay.png" alt="">
            <img src="../assets/sequra.png" alt="">
        </div>
        <h3 class="text-center pt-3">Metodos de envio</h3>
        <div class="sender ms-3 ms-lg-5 mt-lg-3">
            <img src="../assets/correos.png" alt="">
            <img src="../assets/correosexpress.png" alt="">
            <img src="../assets/dhl.png" alt="">
            <img src="../assets/fedex.png" alt="">
            <img src="../assets/gls.png" alt="">
            <img src="../assets/ups.png" alt="">
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";
h3{
color: $black;
font-family: 'Rubik';
}
.paysend{
    background-color: $grey;
    height: 55vh;
}
.payment{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 10px;
    row-gap: 20px;
    img{
        width: 10vh;
        height: 8vh;
    }
}
.sender{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 10px;
    row-gap: 20px;
    img{
        width: 10vh;
        height: 8vh;
    }
}

@media only screen and (min-width: 800px) {
    h3{
color: $black;
font-family: 'Rubik';

}
.paysend{
    background-color: $grey;
    height: 40vh;
}
.payment{
    display: grid;
    grid-template-columns: repeat(6,1fr);
    gap: 10px;
    row-gap: 0px;
    img{
        width: 15vh;
        height: 11vh;
    }
}
.sender{
    display: grid;
    grid-template-columns: repeat(6,1fr);
    gap: 10px;
    row-gap: 20px;
    img{
        width: 15vh;
        height: 11vh;
    }
} 
}
</style>