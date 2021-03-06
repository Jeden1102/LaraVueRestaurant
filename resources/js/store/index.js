import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    logged: false,
    userData:null,
    showCart:false,
    cartItems:[]
  },
  mutations: {
    initialiseStore(state) {
      if (localStorage.getItem('logged') == 'true') {
        state.logged = true;
      }
    if(localStorage.getItem('userData')) {
        state.userData = JSON.parse(localStorage.getItem('userData'));
      }
      if(localStorage.getItem('basket')) {
        state.cartItems = JSON.parse(localStorage.getItem('basket'));
      }
    },
      updateLogged(state){
          state.logged  = !state.logged
      },
      setUserData(state,userInfo){
        state.userData = null;
          state.userData = userInfo;
      },
      changeCart(state){
          state.showCart  = !state.showCart
      },
      addItemToCart(state,product){
        state.cartItems.push(product);
      },
      clearCart(state){
        state.cartItems = [];
      }
    // updateCharacter(state, choice) {
    //   state.character = choice
    // },
    // updateScore(state, amount) {
    //   state.score = amount
    // },
    // updateUIState(state, uistate) {
    //   state.uiState = uistate
    // },
    // pickQuestion(state, character) {
    //   character === state.character ? (state.score += 13) : (state.score -= 13)

    //   if (state.questionIndex < state.questions.length - 1) {
    //     state.questionIndex++
    //   } else {
    //     Math.sign(state.score) > 0 ?
    //       (state.uiState = "won") :
    //       (state.uiState = "lost")
    //   }
    // },
  },
})