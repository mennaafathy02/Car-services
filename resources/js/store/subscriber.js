import axios from "axios";
import Cookies from "js-cookie";
import store from ".";
store.subscribe((mutation) => {
    switch (mutation.type) {
        case "auth/SET_TOKEN":
            if (mutation.payload) {
                axios.defaults.headers.common["Authorization"] =
                    "Bearer " + mutation.payload;
                Cookies.set("token", mutation.payload);
                // go to home page
            } else {
                axios.defaults.headers.common["Authorization"] = null;
                Cookies.remove("token");
            }

            break;
    }
});

export default {
    namespaced: true,
};
