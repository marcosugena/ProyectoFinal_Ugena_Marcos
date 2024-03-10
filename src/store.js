import { createStore } from 'vuex';

const store = createStore({
  state: {
    usuarioLogueado: false,
    NombreUsuario:"",
    IdUsuario:-1
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
    }
  },
  getters: {
    estadoUsuario: (state) => (state.usuarioLogueado ? 'Logueado' : 'No Logueado'),
    nombreDeUsuario: (state) => state.NombreUsuario,
  },
});

export default store;
