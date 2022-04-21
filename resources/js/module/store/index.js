import axios from "axios";
import { createStore } from "vuex";
import auth from "../auth";

const store = createStore({
    state() {
        return {
            users: null,
            isLoggedIn: false,
        };
    },
    mutations: {
        // Untuk kita merubah dan memanipulasi vuex
        set_user(state, data) {
            (state.users = data), (state.isLoggedIn = true);
        },
        reset_user(state) {
            (state.users = null), (state.isLoggedIn = false);
        },
    },
    getters: {
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        users(state) {
            return state.users;
        },
    },
    actions: {
        // action login
        login({ dispatch, commit }, data) {
            return new Promise((resolve, reject) => {
                axios
                    .post("api/user-login", data)
                    .then((response) => {
                        const token = response.data.access_token;
                        localStorage.setItem("token", token);
                        auth.setHeaderToken(token);
                        dispatch("get_user");
                        resolve(response);
                    })
                    .catch((e) => {
                        commit("reset_user");
                        localStorage.removeItem("token");
                        reject(e);
                    });
            });
        },
        // get user function
        async get_user({ commit }) {
            if (!localStorage.getItem("token")) {
                return;
            }
            try {
                let response = await axios.get("user");
                commit("set_user", response.data.data);
            } catch (e) {
                commit("reset_user");
                auth.removeHeaderToken();
                localStorage.removeItem("token");
                return e;
            }
        },
    },
    modules: {
        auth,
    },
});

export default store;
