<template>
    <div class="mb-3 p-1 d-flex align-items-center flex-column">
        <div class="productbox d-flex ">
        </div>
        <div class="productext d-flex justify-content-center mt-3">
            <p>WHEY PROTEIN</p>
        </div>
        <div id="price" class="d-flex flex-column align-items-center mt-0">
            <p>22,90 €</p>
            <button>AÑADIR AL CARRITO</button>
        </div>

    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";

.productbox {
    background-image: url("../assets/recommend1.png");
    background-size: cover;
    height: 19vh;
    width: 19vh;
    background-color: $white;
    margin-top: 2vh;
    border-radius: 16px;
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 0 15px $bluelight;

    &:hover {
        transform: translateY(-10%);
        box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
    }
}

.productext {
    p {
        font-size: smaller;
    }
}

#price {
    button {
        background-color: $white;
        color: $blue;
        padding: 10px;
        border-radius: 4px;
        border: 2px solid $blue;
        &:hover{
            background-color: $blue;
            color: $white;
        }
    }
}

@media only screen and (min-width: 1200px) {
    .productbox {

        background-image: url("../assets/recommend1.png");
        background-size: cover;
        height: 24vh;
        width: 24vh;
        background-color: $white;
        margin-top: 2vh;
        border-radius: 16px;
        transition: transform 0.3s, box-shadow 0.3s;

        &:hover {
            transform: translateY(-10%);
            box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
        }
    }

    .productext {
        p {
            font-size: smaller;
        }
    }


}</style>