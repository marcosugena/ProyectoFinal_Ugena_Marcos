import { createStore } from 'vuex';

const store = createStore({
  state: {
    usuarioLogueado: false,
    NombreUsuario:"",
    IdUsuario:-1,
    Carrito:[]
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
    agregarAlCarrito(state, producto) {
      const index = state.Carrito.findIndex(item => item.Id === producto.Id);
  
      if (index !== -1) {
          // Si el producto ya está en el carrito, incrementa la cantidad
          state.Carrito[index].Cantidad++;
      } else {
          // Si el producto no está en el carrito, agrégalo con cantidad 1
          producto.Cantidad = 1;
          state.Carrito.push(producto);
      }
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
    }
  },
  getters: {
    estadoUsuario: (state) => (state.usuarioLogueado ? 'Logueado' : 'No Logueado'),
    nombreDeUsuario: (state) => state.NombreUsuario,
    Idusu: (state) => state.IdUsuario,
    carrito: state => state.Carrito
  },
});

export default store;
