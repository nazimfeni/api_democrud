import { createStore } from "vuex";
import router from "./router";
import { Pusher } from 'pusher-js';

export default createStore({
    state: {
        //toy
        isLoggedIn: !!localStorage.getItem("token"),
    },

    mutations: {
        // button (instructions)
        LOGIN(state) {
            isLoggedIn = true; // ON
        },

        LOGOUT(state) {
            isLoggedIn = false // OFF;

        },
    },

    actions: {
login({commit}){
 commit('LOGIN')
},

logout({commit, dispatch}){
      commit('LOGOUT')
      dispatch('navigateToLogin')
     },
     navigateToLogin(){
      router.Push({name: login});
     }
    },
});
