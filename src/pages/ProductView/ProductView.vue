<template>
    <HeaderComponent></HeaderComponent>
    <div class="productview w-100 pb-5">
        <div class="d-flex justify-content-center flex-column flex-lg-row productcontainer">
            <div class="d-flex mx-3">
                <img :src="producto.ImagenProducto" alt="">
            </div>
            <div class="d-flex flex-column ms-lg-5 justify-content-center align-items-center mt-3 mt-lg-0 producttext ">
                <h2 class="text-center mt-4 mt-lg-0">{{ producto.Nombre }}</h2>
                <p class="text-center w-100 mt-4">{{ producto.Descripcion }}</p>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center carritobutton">
            <button class="d-flex flex-row justify-content-center align-items-center" @click="AnyadirCarrito()">AÑADIR
                POR {{ producto.Precio }}€ <img src="../../assets/carrito-de-compras.png" alt="" class="ms-2"></button>
        </div>
    </div>
    <FooterComponent></FooterComponent>
</template>

<script>
import axios from 'axios';
import HeaderComponent from "../../components/HeaderComponent.vue";
import FooterComponent from "../../components/FooterComponent.vue";
export default {
    components: {
        HeaderComponent,
        FooterComponent
    },
    data() {
        return {
            producto: [],
            idehashed: 0
        };
    },
    mounted() {
        this.$store.dispatch('decrypt', this.$route.params.id)
            .then(dehashedPid => {
                this.cargaproducto(parseInt(dehashedPid));
                this.idehashed = parseInt(dehashedPid);
            })
            .catch(error => {
                console.error('Error al encriptar el precio:', error);
            });
    },
    methods: {
        async cargaproducto(id) {
            try {
                const respuesta = await axios.post("http://127.0.0.1:8000/api/viewproductid", { id });
                this.producto = respuesta.data
            } catch (error) {
                console.error('Error al obtener el producto por ID:', error);
            }
        },
        async AnyadirCarrito() {
            const producto = {
                Precio: this.producto.Precio,
                ImagenProducto: this.producto.ImagenProducto,
                Nombre: this.producto.Nombre,
                Id: this.idehashed,
                Cantidad: 1
            };
            this.$store.commit("agregarAlCarrito", producto)
        }
    },

    watch: {
        '$route'() {
            this.$store.dispatch('decrypt', this.$route.params.id)
                .then(dehashedPid => {
                    this.idehashed = parseInt(dehashedPid);
                    this.cargaproducto(parseInt(dehashedPid));
                })
                .catch(error => {
                    console.error('Error al encriptar el precio:', error);
                });
        }
    },
};
</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";

.productview {
    background-color: $black;
    height: auto;
    width: 100%;
}

.productcontainer {
    padding: 50px;

    h2 {
        color: $white
    }

    p {
        color: $white;
        font-size: larger;
    }

    img {
        border-radius: 16px;
        width: 30vh;
        height: 30vh;
        background-color: $white;
    }
}

.carritobutton {
    button {
        background-color: red;
        color: $white;
        border: none;
        padding: 10px;

        img {
            width: 4vh;
            height: 4vh;
        }

        &:hover {
            background-color: $blue;
        }
    }

}

.producttext {
    width: 100%;
}

@media only screen and (min-width: 1200px) {
    .productview {
        background-color: $black;
        height: auto;
        width: 100%;
    }

    .productcontainer {
        padding: 50px;

        h2 {
            color: $white
        }

        p {
            color: $white;
            font-size: larger;
        }

        img {
            border-radius: 16px;
            width: 60vh;
            height: 60vh;
            background-color: $white;
        }
    }

    .carritobutton {
        button {
            background-color: red;
            color: $white;
            border: none;
            padding: 10px;

            img {
                width: 4vh;
                height: 4vh;
            }

            &:hover {
                background-color: $blue;
            }
        }

    }

    .producttext {
        width: 25%;
    }

}
</style>
