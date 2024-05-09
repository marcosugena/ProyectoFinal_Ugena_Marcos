<template>
    <HeaderComponent></HeaderComponent>

    <div class="adminpanel p-lg-5 p-2">
        <div class="addproduct p-5 ">
            <h3 class="text-center mb-4 mb-lg-0">Añadir Producto</h3>
            <div class="p-lg-5 formaddpr d-flex flex-column ">
                <div>
                    <p class="mb-1">Nombre</p>
                    <input type="text" v-model="product.nombre">
                </div>
                <div>
                    <p class="mt-2 mb-1">Imagen a Subir</p>
                    <input type="file" @change="handleFileUpload" class="form-control" id="imgproduct">
                </div>
                <div>
                    <p class="mt-2 mb-1">Descripción</p>
                    <textarea class="form-control " style="resize: none;" v-model="product.descripcion">

                    </textarea>
                </div>
                <div>
                    <p class="mb-1">Precio</p>
                    <input type="text" v-model="product.precio">
                </div>
                <div>
                    <p class="mb-1">Tipo</p>
                    <select name="tipo" v-model="product.tipo">
                        <option value="nutricion">Nutrición</option>
                        <option value="proteina">Proteína</option>
                        <option value="vitaminas">Vitaminas</option>
                        <option value="barritas">Barritas y Snacks</option>
                        <option value="alimentacion">Alimentación</option>
                    </select>

                </div>
                <div class="w-100 d-flex justify-content-center flex-column align-items-center">
                    <button @click="prbdd()" class="form-control " id="btns">Añadir Producto</button>
                    <p class="text-primary mt-2">{{ res }}</p>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
import axios from 'axios';
import HeaderComponent from "../../components/HeaderComponent.vue";
export default {
    components: {
        HeaderComponent
    },
    data() {
        return {
            Imagen: null,
            product: {
                nombre: "",
                descripcion: "",
                precio: "",
                tipo: "",
                imagenname: ""
            },
            res:""
        }
    },
    beforeMount() {
        /*if(this.checkAdmin() == false){
            this.$router.push("/")
        }
        */
    },
    methods: {
        checkAdmin() {
            if (this.$store.getters.Admin == false) {
                return false;
            } else {
                return true
            }
        },
        async prbdd() {
            this.subirfoto();
            const respuesta = await axios.post('http://127.0.0.1:8000/api/createproduct', this.product);
            if(respuesta.data.success){
                this.res="Producto añadido con exitó";
            }
        },
        handleFileUpload(event) {
            this.Imagen = event.target.files[0];
            this.product.imagenname = "/" + this.Imagen.name;
        },
        async subirfoto() {
            let formData = new FormData();
            formData.append('imagen', this.Imagen);
            try {
                await axios.post('http://127.0.0.1:8000/api/guardar-imagen', formData);
            
            } catch (error) {
                console.error('Error al subir la imagen:', error);
            }
        }

    }
}

</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";

.adminpanel {
    background-color: $black;

}

#btns {
    width: 100%;
}

.addproduct {
    margin-left: 5%;
    margin-right: 5%;
    height: auto;
    background-color: $white;
    box-shadow: 0 0 5px rgba(255, 255, 255, 1);
    border-radius: 16px;

    input {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        border-radius: 8px;
        padding: 3px;
    }

    input[type="file"] {
        width: 100%;
    }

    textarea {
        height: 20vw;
    }

    .formaddpr {
        div {
            margin-bottom: 30px;
        }
    }
}

@media only screen and (min-width: 800px) {
    #btns {
        width: 20%;
    }

    .adminpanel {
        background-color: $black;

    }

    .addproduct {
        margin-left: 5%;
        margin-right: 5%;
        height: auto;
        background-color: $white;
        box-shadow: 0 0 5px rgba(255, 255, 255, 1);
        border-radius: 16px;

        input {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            padding: 3px;
        }

        input[type="file"] {
            width: 45%;
        }

        textarea {
            height: 10vw;
            width: 80%;
        }

        .formaddpr {
            div {
                margin-bottom: 30px;
            }
        }
    }

}
</style>