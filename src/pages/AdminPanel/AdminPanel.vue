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
              <td class="text-danger p-3">
                <button class="btn btn-info mb-3" @click="openEditModal(producto)">Editar</button>
                <button class="btn btn-danger" @click="deleteProduct(producto.ProductId)">Eliminar</button>
              </td>
            </tr>
          </tbody>

        </table>
      </div>

      <div class="delete-mobile d-block d-lg-none">
        <ul class="text-center d-flex flex-column justify-content-center" v-for="producto in prs" :key="producto.id">
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
          <input type="text" id="regusu" class="form-control w-100" v-model="userData.username" />
        </div>
        <div class="mb-4">
          <label for="regemail">Email</label>
          <input type="email" id="regemail" class="form-control w-100" v-model="userData.email" />
        </div>
        <div class="mb-4">
          <label for="regpass">Password</label>
          <input type="password" id="regpass" class="form-control w-100" v-model="userData.password" />
        </div>
        <div class="d-flex justify-content-center mt-3 flex-column align-items-center">
          <button type="submit" class="btn btn-primary w-lg-25 mt-2" @click="anyadeadmin()">
            Create Admin
          </button>
          <div id="danger" class="text-center mt-4"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de confirmación -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Está seguro de que desea eliminar este producto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" @click="confirmDelete">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de confirmación para eliminar usuario -->
  <div class="modal fade" id="confirmDeleteUserModal" tabindex="-1" aria-labelledby="confirmDeleteUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteUserModalLabel">Confirmar Eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Está seguro de que desea eliminar este usuario?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" @click="confirmDeleteUser">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para editar producto -->
  <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="editProduct">
            <div class="mb-3">
              <label for="editProductName" class="form-label" style="color: black;">Nombre</label>
              <input type="text" class="form-control" id="editProductName" v-model="editedProduct.Nombre" />
            </div>
            <div class="mb-3">
              <label for="editProductDescription" class="form-label" style="color: black;">Descripción</label>
              <textarea class="form-control" id="editProductDescription" style="resize: none"
                v-model="editedProduct.Descripcion"></textarea>
            </div>
            <div class="mb-3">
              <label for="editProductPrice" class="form-label" style="color: black;">Precio</label>
              <input type="number" step="0.01" class="form-control text-black" id="editProductPrice"
                v-model="editedProduct.Precio" />
            </div>
            <div class="mb-3">
              <label for="editProductType" class="form-label" style="color: black;">Tipo</label>
              <select id="editProductType" class="form-select w-25" v-model="editedProduct.Tipo">
                <option value="nutricion">Nutrición</option>
                <option value="proteina">Proteína</option>
                <option value="vitaminas">Vitaminas</option>
                <option value="barritas">Barritas y Snacks</option>
                <option value="alimentacion">Alimentación</option>
              </select>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


</template>

<script>
import axios from "axios";
import HeaderComponent from "@/components/HeaderComponent.vue";
import { Modal } from "bootstrap"; 

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
        username: "",
        email: "",
        password: "",
      },
      productIdToDelete: null,
      userIdToDelete: null,
      editedProduct: {
        ProductId: null,
        Nombre: "",
        Descripcion: "",
        Precio: "",
        Tipo: "",
        ImagenProducto: ""
      },

    };
  },
  beforeMount() {
    if (this.checkAdmin() == false) {
      this.$router.push("/");
    }
  },
  methods: {
    async editProduct() {
      try {
        await axios.put(`${this.$store.getters.backurl}/api/updateproduct/${this.editedProduct.ProductId}`, this.editedProduct);
        var editProductModal = Modal.getInstance(document.getElementById('editProductModal'));
        if (editProductModal) {
          editProductModal.hide();
        }
       
        this.cogerProducts();
      } catch (error) {
        console.error("Error al editar el producto:", error);
      }
    },
    openEditModal(product) {
      this.editedProduct = { ...product };
      var editProductModal = new Modal(document.getElementById('editProductModal'));
      editProductModal.show();
    },
    checkAdmin() {
      if (this.$store.getters.Admin == false) {
        return false;
      } else {
        return true;
      }
    },
    async prbdd(e) {
      e.preventDefault();
      if (
        !this.product.nombre ||
        !this.Imagen ||
        !this.product.descripcion ||
        !this.product.precio ||
        !this.product.tipo
      ) {
        this.res = "Por favor, complete todos los campos";
        return;
      }
      this.subirfoto();
      const respuesta = await axios.post(
        this.$store.getters.backurl + "/api/createproduct",
        this.product
      );
      if (respuesta.data.success) {
        this.res = "Producto añadido con éxito";
      }
      setTimeout(() => {
        this.cogerProducts();
      }, 2000);
    },
    handleFileUpload(event) {
      this.Imagen = event.target.files[0];
      this.product.imagenname = "/" + this.Imagen.name;
    },
    async subirfoto() {
      let formData = new FormData();
      formData.append("imagen", this.Imagen);
      try {
        await axios.post(
          this.$store.getters.backurl + "/api/guardar-imagen",
          formData
        );
      } catch (error) {
        console.error("Error al subir la imagen:", error);
      }
    },
    async cogerProducts() {
      const respuesta = await axios.get(
        this.$store.getters.backurl + "/productos"
      );
      this.prs = respuesta.data;
    },
    deleteProduct(id) {
      this.productIdToDelete = id;
      var confirmDeleteModal = new Modal(document.getElementById('confirmDeleteModal'));
      confirmDeleteModal.show();
    },
    async confirmDelete() {
      await axios.get(this.$store.getters.backurl + `/api/deleteproduct/${this.productIdToDelete}`);
      this.productIdToDelete = null;
      this.cogerProducts();
      var confirmDeleteModal = Modal.getInstance(document.getElementById('confirmDeleteModal'));
      if (confirmDeleteModal) {
        confirmDeleteModal.hide();
      }
    },
    async cogerUsers() {
      const respuesta = await axios.get(this.$store.getters.backurl + "/users");
      this.users = respuesta.data;
    },
    deleteUser(id) {
      this.userIdToDelete = id;
      var confirmDeleteUserModal = new Modal(document.getElementById('confirmDeleteUserModal'));
      confirmDeleteUserModal.show();
    },
    async confirmDeleteUser() {
      await axios.get(this.$store.getters.backurl + `/api/deleteuser/${this.userIdToDelete}`);
      this.userIdToDelete = null;
      this.cogerUsers();
      var confirmDeleteUserModal = Modal.getInstance(document.getElementById('confirmDeleteUserModal'));
      if (confirmDeleteUserModal) {
        confirmDeleteUserModal.hide();
      }
    },
    async anyadeadmin() {
      await axios.post(
        this.$store.getters.backurl + "/api/createadmin",
        this.userData
      );
      this.cogerUsers();
    },
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
