<template>
    <div class="lipay w-100 d-flex flex-row align-items-center justify-content-between p-5">
        <img :src="imgurl" alt="" class="">
        <p class="text-center mt-4 ">{{name}}</p>
        <p class="text-center mt-4 ">X{{ cantidad }}</p>
        <p class="text-center mt-4 ">{{precio}}€</p>
    </div>
</template>

<script>
    export default {
        props:{
            imgurl:String,
            name:String ,
            cantidad:Number,
            precio:String
        }
    }
</script>

<style lang="scss" scoped>
@import "../Style/variables.scss";
    .lipay{
        background-color: $black;
        color: $white;
        font-size: x-large;
        img{
            width: 8vw;
        }
    }
</style>