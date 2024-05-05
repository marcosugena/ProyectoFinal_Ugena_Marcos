<template>
    <div class="paysend ">
        <br><br><br><br><br><br><br><br><br>
        <div class="payment d-flex justify-content-end pr-3 mx-3">
            <div><img src="@/assets/mastercard.png" alt=""></div>
            <div><img src="@/assets/visa.png" alt=""></div>
            <div><img src="@/assets/paypal.png" alt=""></div>
            <div><img src="@/assets/bizum.png" alt=""></div>
            <div><img src="@/assets/amazonpay.png" alt=""></div>
            <div> <img src="@/assets/sequra.png" alt=""></div>
        </div>
        <div class="sender d-flex justify-content-end mt-2 pr-3 mx-3">
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
h3{
color: $black;
font-family: 'Rubik';
}
.paysend{
    background-color: $grey;
    height: 55vh;
    
}
.payment{ 
    img{
        width: 10vh;
        height: 6vh;
    }
}
.sender{
    img{
        width: 10vh;
        height: 6vh;
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
        width: 10vh;
        height: 6vh;
    }
}
.sender{

    img{
        width: 10vh;
        height: 6vh;
    }
} 
}

</style>