import { createApp } from "vue";
import { createPinia } from "pinia";
// phone
import VueTelInput from "vue3-tel-input";
import "vue3-tel-input/dist/vue3-tel-input.css";
// App
import App from "./App.vue";
import vuex from "vuex";
// Router
import router from "./router";
// Bootstrap
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
// Global Css
import "../css/app.css";
// Language
import i18n from "./i18n/index";
import en from "./i18n/locales/en.json";
import ar from "./i18n/locales/ar.json";
// Store
import store from "./store";
import { required } from "@vuelidate/validators";
// Cookies
import Cookies from "js-cookie";
// Swal
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
// Axios
import axios from "axios";
// ref
import {ref} from "vue"
// Animation
import 'animate.css';
// Store
import "./store/subscriber";
export default {
    en,
    ar,
};

// phone
const app = createApp(App);
app.use(VueTelInput);
// Pinia
app.use(createPinia());
// Router
app.use(router);
// Lang
app.use(i18n);

app.use(ref);

app.use(store);
store.dispatch("auth/attempt", Cookies.get("token")).then(() => {
    app.mount("#app");
});

store.dispatch("auth/attempt", Cookies.get("token"));

