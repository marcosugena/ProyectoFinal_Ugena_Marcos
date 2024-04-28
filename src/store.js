import { createStore } from 'vuex';
import CryptoJS from 'crypto-js';
const store = createStore({
  state: {
    usuarioLogueado: false,
    NombreUsuario:"",
    IdUsuario:-1,
    Carrito:[],
    key:"'S,2L4eR1d8a0WYN1UVz><?.fcdB4f£9g5m0,kXj;Do}@?i0GY"
  },
  mutations: {
    setUsuarioLogueado(state, valor) {
      state.usuarioLogueado = valor;
    },
    setUserName(state, valor) {
      state.NombreUsuario = valor;
    },
    setId(state, valor){
      state.IdUsuario = valor;
    },
    setcarrito(state,carrito){
      state.Carrito = carrito;
    },
    agregarAlCarrito(state, producto) {
      let encontrado=false;
      for(let i=0;i<state.Carrito.length;i++){
        if(producto.Id === state.Carrito[i].Id){
          state.Carrito[i].Cantidad++;
          encontrado=true;
          break;
        }
      }
      if(!encontrado){
        state.Carrito.push(producto);
      }



      /*
      const index = state.Carrito.findIndex(item => item.Id === producto.Id);
  
      if (index !== -1) {
          // Si el producto ya está en el carrito, incrementa la cantidad
          state.Carrito[index].Cantidad++;
      } else {
          // Si el producto no está en el carrito, agrégalo con cantidad 1
          const nuevoProducto = { ...producto }; // Crear una copia del producto
          nuevoProducto.Cantidad = 1;
          state.Carrito.push(nuevoProducto);
         
      }
       */
  }
  
  
  },
  actions: {
    login({ commit }) {
      // Lógica de autenticación
      commit('setUsuarioLogueado',true);
    },
    logout({ commit }) {
      // Cambiar el estado utilizando una mutación
      commit('setUsuarioLogueado',false);
    },
    UserName({ commit }, nombreUsuario) {
      // Lógica de actualización del nombre de usuario
      commit('setUserName', nombreUsuario);
    },
    IdUsuario({ commit }, id) {
      // Lógica de actualización del nombre de usuario
      commit('setId', id);
    },
    agregarAlCarrito({ commit }, producto) {
      commit('agregarAlCarrito', producto);
    },
    ponercarrito({ commit }, carrito) {
      // Lógica de actualización de carrito
      commit('setcarrito', carrito);
    },
    encrypt(context, valor) {
      // Lógica de encriptación
      return CryptoJS.AES.encrypt(valor, context.state.key).toString();
    },
    decrypt(context, valor) {
      // Lógica de desencriptación
      return CryptoJS.AES.decrypt(valor, context.state.key).toString(CryptoJS.enc.Utf8);
    }
  },
  getters: {
    estadoUsuario: (state) => (state.usuarioLogueado ? 'Logueado' : 'No Logueado'),
    nombreDeUsuario: (state) => state.NombreUsuario,
    Idusu: (state) => state.IdUsuario,
    carrito: state => state.Carrito,
    key: state => state.key
  },
});

export default store;
