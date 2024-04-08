<template>
    <div class="paysend">
        <h3 class="text-center pt-3">Metodos de pago</h3>
        <div class="payment ms-3 ms-lg-5 mt-lg-3 d-lg-flex justify-content-around ">
            <div><img src="../assets/mastercard.png" alt=""></div>
            <div><img src="../assets/visa.png" alt=""></div>
            <div><img src="../assets/paypal.png" alt=""></div>
            <div><img src="../assets/bizum.png" alt=""></div>
            <div><img src="../assets/amazonpay.png" alt=""></div>
            <div> <img src="../assets/sequra.png" alt=""></div>
        </div>
        <h3 class="text-center pt-3">Metodos de envio</h3>
        <div class="sender ms-3 ms-lg-5 mt-lg-3 d-lg-flex justify-content-around ">
        <div><img src="../assets/correos.png" alt=""></div>
        <div> <img src="../assets/correosexpress.png" alt=""></div>
        <div><img src="../assets/dhl.png" alt=""></div>
        <div><img src="../assets/fedex.png" alt=""></div>
        <div> <img src="../assets/gls.png" alt=""></div>
        <div> <img src="../assets/ups.png" alt=""></div>     
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
    height: 50vh;
}
.payment{
 
    img{
        width: 15vh;
        height: 11.5vh;
    }
}
.sender{

    img{
        width: 15vh;
        height: 11.5vh;
    }
} 
}
</style>