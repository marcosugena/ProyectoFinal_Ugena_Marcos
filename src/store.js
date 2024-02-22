import { createStore } from 'vuex';

const store = createStore({
  state: {
    usuarioLogueado: false,
  },
  mutations: {
    setUsuarioLogueado(state, valor) {
      state.usuarioLogueado = valor;
    },
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
  },
  getters: {
    estadoUsuario: (state) => (state.usuarioLogueado ? 'Logueado' : 'No Logueado'),
  },
});

export default store;
