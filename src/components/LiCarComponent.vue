<template>
    <div>
        <div class="containerli d-flex align-content-center justify-content-between align-items-center ">
            <img :src="imageurl" alt="">
            <li class="text-center w-25">{{name}}</li>
            <li>X{{Cantidad}}</li>
            <li>{{price}}€</li>
            <li><img src="/papelera.png" alt="" id="papelera"></li>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            price:String,
            imageurl:String,
            name:String,
            Cantidad:{
            default:1,    
            Number
            }
        }
    }
</script>

<style lang="scss" scoped>
.containerli{
    margin: 10px;
    img{
        width: 80px;
    }
    #papelera{
        width: 32px;
        margin-left: 20px;
    }
}
   
</style>