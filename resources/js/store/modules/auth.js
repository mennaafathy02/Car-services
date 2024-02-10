import axios from "axios";
import Cookies from "js-cookie";
import { attempt } from "lodash";
// import * as types from "../mutations_types";
import Swal from "sweetalert2";

// state
const state = {
    auth: {
        token: null,
        user: null,
    },
    isLogged: false,
    timeLoaded: null,
};

// getters
const getters = {
    authenticated(state) {
        return state.auth.token;
    },
    user(state) {
        return state.auth.user;
    },
    timeLoaded(state) {
        return state.timeLoaded;
    }
};

// mutations
const mutations = {
    SET_TOKEN(state, token) {
        state.auth.token = token;
    },
    SET_USER(state, data) {
        state.auth.user = data;
    },
    SET_logged(state, token) {
        if (token) {
            state.isLogged = true;
        }
    },
    SET_TimeLoaded(state, time) {
        state.timeLoaded = time;
    }
};

// actions
const actions = {
    login({ commit }) {
        commit(types.LOGIN);
    },
    async signIn({ dispatch }, credit) {
        // store token
        let response = await axios
            .post("api/login", credit)
            .then((result) => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener("mouseenter", Swal.stopTimer);
                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                    },
                });
                Toast.fire({
                    icon: "success",
                    title: "Log in successfully",
                });
                return result;
            })
            .catch(() => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Phone or password is incorrect",
                });
            });
        let token = response.data.data.token;
        dispatch("attempt", token);
        Cookies.set("token", token, { expires: 365 });
    },
    async register({ dispatch }, credit) {
        // store token
        let response = await axios
            .post("api/register", credit)
            .then((result) => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener("mouseenter", Swal.stopTimer);
                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                    },
                });
                Toast.fire({
                    icon: "success",
                    title: "Account successfully created",
                });
                return result;
            })
            .catch(() => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Email or phone number already exists",
                });
            });
        let token = response.data.data.token;

        dispatch("attempt", token);
        Cookies.set("token", token, { expires: 365 });
    },
    async attempt({ commit, state }, token) {
        if (token) {
            commit("SET_TOKEN", token);
        }
        if (!state.auth.token) {
            return;
        }
        try {
            let response = await axios.get("/api");
            commit("SET_USER", response.data.data); // store user in state
            commit("SET_logged", true);
        } catch (error) {
            commit("SET_TOKEN", null);
            commit("SET_USER", null);
            commit("SET_logged", false);
        }
    },
    logout({ commit }) {
        return axios
            .post("/api/logout")
            .then(() => {
                commit("SET_TOKEN", null);
                commit("SET_USER", null);
                commit("SET_logged", false);
                Cookies.remove("token");
            })
            .then((result) => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener("mouseenter", Swal.stopTimer);
                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                    },
                });
                Toast.fire({
                    icon: "success",
                    title: "Log Out Successfully",
                });
                return result;
            })
            .catch(() => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong",
                });
            });
    },
    async SET_TimeLoaded({ commit }, time) {
        commit("SET_TimeLoaded", time);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
};
