import Vuex from "vuex";
import auth from "./modules/auth";

export default new Vuex.Store({
    namespaced: true,
    modules: {
        auth,
    },
});
