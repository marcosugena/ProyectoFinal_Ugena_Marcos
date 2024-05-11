<template>
    <HeaderComponent></HeaderComponent>

    <div class="adminpanel p-lg-5 p-2">
        <div class="addproduct p-5">
            <h3 class="text-center mb-4 mb-lg-0">Añadir Producto</h3>
            <div class="p-lg-5 formaddpr d-flex flex-column">
                <form @submit.prevent="prbdd">
                    <div>
                        <p class="mb-1">Nombre</p>
                        <input type="text" v-model="product.nombre" />
                    </div>
                    <div>
                        <p class="mt-2 mb-1">Imagen a Subir</p>
                        <input type="file" @change="handleFileUpload" class="form-control" id="imgproduct" />
                    </div>
                    <div>
                        <p class="mt-2 mb-1">Descripción</p>
                        <textarea class="form-control" style="resize: none" v-model="product.descripcion">
          </textarea>
                    </div>
                    <div>
                        <p class="mb-1">Precio</p>
                        <input type="number" step="0.01" v-model="product.precio" />
                    </div>
                    <div>
                        <p class="mb-1">Tipo</p>
                        <select name="tipo" class="form-select w-25" v-model="product.tipo">
                            <option value="nutricion">Nutrición</option>
                            <option value="proteina">Proteína</option>
                            <option value="vitaminas">Vitaminas</option>
                            <option value="barritas">Barritas y Snacks</option>
                            <option value="alimentacion">Alimentación</option>
                        </select>
                    </div>
                    <div class="w-100 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="form-control btn btn-primary" id="btns">
                            Añadir Producto
                        </button>
                        <p class="text-primary mt-2">{{ res }}</p>
                    </div>
                </form>
            </div>
        </div>

        <div class="removeproduct p-5 mt-5">
            <h3 class="text-center mb-4 mb-lg-5">Quitar Producto</h3>
            <div class="table d-none d-lg-block">
                <table class="table table-dark table-striped table-sm">
           
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ProductId</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">ImagenProducto</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
          
                    <tbody class="text-center">
                        <tr v-for="producto in prs" :key="producto.id">
                            <td>{{ producto.ProductId }}</td>
                            <td>{{ producto.Nombre }}</td>
                            <td>
                                <img :src="producto.ImagenProducto" alt="Imagen Producto" />
                            </td>
                            <td>{{ producto.Descripcion }}</td>
                            <td>{{ producto.Precio }}€</td>
                            <td>{{ producto.Tipo }}</td>
                            <td class="text-danger p-3" @click="deleteProduct(producto.ProductId)">
                                DELETE
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="delete-mobile d-block d-lg-none">
                <ul class="text-center d-flex flex-column justify-content-center" v-for="producto in prs"
                    :key="producto.id">
                    <li class="p-3">ID {{ producto.ProductId }}</li>
                    <li class="p-3">{{ producto.Nombre }}</li>
                    <li class="p-3"><img :src="producto.ImagenProducto" /></li>
                    <li class="p-3">{{ producto.Precio }}€</li>
                    <li class="p-3">{{ producto.Tipo }}</li>
                    <li class="text-danger" @click="deleteProduct(producto.ProductId)">
                        DELETE
                    </li>
                </ul>
            </div>
        </div>

        <div class="removeusers p-5 mt-5">
            <h3 class="text-center mb-4 mb-lg-5">Quitar Usuarios</h3>
            <div class="table d-none d-lg-block">
                <table class="table table-dark table-striped table-sm">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">UserId</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Gmail</th>
                            <th scope="col">Admin</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr v-for="usuario in users" :key="usuario.UserId">
                            <td>{{ usuario.UserId }}</td>
                            <td>{{ usuario.UserName }}</td>
                            <td>{{ usuario.Gmail }}</td>
                            <td>{{ usuario.Admin === 1 ? "Si" : "No" }}</td>
                            <td class="text-danger p-3" @click="deleteUser(usuario.UserId)">
                                DELETE
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="removeusers-mobile d-block d-lg-none">
                <ul v-for="usuario in users" :key="usuario.UserId"
                    class="d-flex flex-column justify-content-around align-items-center">
                    <li class="p-3">ID: {{ usuario.UserId }}</li>
                    <li class="p-3">NAME: {{ usuario.UserName }}</li>
                    <li class="p-3 text-wrap text-center">GMAIL: {{ usuario.Gmail }}</li>
                    <li class="p-3">ADMIN: {{ usuario.Admin === 1 ? "Si" : "No" }}</li>
                    <li class="text-danger p-3" @click="deleteUser(usuario.UserId)">
                        DELETE
                    </li>
                </ul>
            </div>
        </div>
        <div class="adduseradmin p-5 mt-5">
            <h3 class="text-center mb-4 mb-lg-5">Añadir Usuarios Admin</h3>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="mb-4">
                    <label for="regusu">UserName</label>
                    <input type="text" id="regusu" class="form-control w-100" v-model="userData.username">
                </div>
                <div class="mb-4">
                    <label for="regemail">Email</label>
                    <input type="email" id="regemail" class="form-control w-100" v-model="userData.email">
                </div>
                <div class="mb-4">
                    <label for="regpass">Password</label>
                    <input type="password" id="regpass" class="form-control w-100" v-model="userData.password">
                </div>
                <div class="d-flex justify-content-center mt-3 flex-column align-items-center">
                    <button type="submit" class="btn btn-primary w-lg-25 mt-2" @click="anyadeadmin()">Create
                        Admin</button>
                    <div id="danger" class="text-center mt-4"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import HeaderComponent from "../../components/HeaderComponent.vue";
export default {
    components: {
        HeaderComponent,
    },
    data() {
        return {
            Imagen: null,
            product: {
                nombre: "",
                descripcion: "",
                precio: "",
                tipo: "",
                imagenname: "",
            },
            res: "",
            prs: [],
            users: [],
            userData: {
                username: '',
                email: '',
                password: '',
            }
        };
    },
    beforeMount() {
        if (this.checkAdmin() == false) {
            this.$router.push("/")
        }
    },
    methods: {
        checkAdmin() {
            if (this.$store.getters.Admin == false) {
                return false;
            } else {
                return true;
            }
        },
        async prbdd(e) {
            e.preventDefault();
            if (!this.product.nombre || !this.Imagen || !this.product.descripcion || !this.product.precio || !this.product.tipo) {
                this.res = "Por favor, complete todos los campos";
                return; 
            }
            this.subirfoto();
            const respuesta = await axios.post(
                "http://127.0.0.1:8000/api/createproduct",
                this.product
            );
            if (respuesta.data.success) {
                this.res = "Producto añadido con exitó";
            }
            this.cogerProducts();
        },
        handleFileUpload(event) {
            this.Imagen = event.target.files[0];
            this.product.imagenname = "/" + this.Imagen.name;
        },
        async subirfoto() {
            let formData = new FormData();
            formData.append("imagen", this.Imagen);
            try {
                await axios.post("http://127.0.0.1:8000/api/guardar-imagen", formData);
            } catch (error) {
                console.error("Error al subir la imagen:", error);
            }
        },
        async cogerProducts() {
            const respuesta = await axios.get("http://127.0.0.1:8000/productos");
            this.prs = respuesta.data;
        },
        async deleteProduct(id) {
            await axios.get(`http://127.0.0.1:8000/api/deleteproduct/${id}`);
            this.cogerProducts();
        },
        async cogerUsers() {
            const respuesta = await axios.get("http://127.0.0.1:8000/users");
            this.users = respuesta.data;
        },
        async deleteUser(id) {
            await axios.get(`http://127.0.0.1:8000/api/deleteuser/${id}`);
            this.cogerUsers();
        },
        async anyadeadmin() {
            await axios.post('http://127.0.0.1:8000/api/createadmin', this.userData);
            this.cogerUsers();
        }
    },
    mounted() {
        this.cogerProducts();
        this.cogerUsers();
    },
};
</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";

h3 {
    color: $white;
}

p {
    color: $white;
}

label {
    color: $white;
}

button {
    background-color: $bluelight;
    ;
}

li {
    color: $white;
}

@mixin fromadmin {
    margin-left: 5%;
    margin-right: 5%;
    height: auto;
    background-color: $black;
    box-shadow: 0 0 5px rgba(255, 255, 255, 1);
    border-radius: 16px;
}

.adduseradmin {
    @include fromadmin;
}

.removeproduct {
    @include fromadmin;
}

.removeusers {
    @include fromadmin;
}

.adminpanel {
    background-color: $black;
}

#btns {
    width: 100%;
}

.addproduct {
    @include fromadmin;

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

img {
    width: 80px;
    height: 80px;
}

.delete-mobile {
    ul {
        border: 2px solid $black;
        padding: 20px;

        li {
            list-style: none;
            text-decoration: none;
        }
    }
}

.removeusers-mobile {
    ul {
        border: 2px solid $black;
        padding: 30px;


        li {
            list-style: none;
            text-decoration: none;
        }
    }
}

@media only screen and (min-width: 800px) {
    #btns {
        width: 20%;
    }

    .adduseradmin {
        margin-left: 25%;
        margin-right: 25%;
    }

    .adminpanel {
        background-color: $black;
    }

    .addproduct {
        @include fromadmin;

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
