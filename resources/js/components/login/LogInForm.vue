<template>
    <div class="RegisterForm">
        <form
            @submit.prevent="submitForm"
            class="d-flex flex-column gap-3"
            action="/login"
        >
            <!--    Phone -->
            <div class="Phone">
                <input type="text" v-model="state.form.phone" class="phoneNumber" :placeholder="$t('Your Phone')" @change="phoneInput">
                <small class="text-danger" v-if="v$.form.phone.$error">
                    {{ v$.form.phone.$errors[0].$message }}
                </small>
            </div>
            <!--    Password -->
            <div class="Password">
                <input
                    type="password"
                    name="Password"
                    id="password"
                    :placeholder="$t('Password')"
                    v-model="state.form.password"

                />
                <small class="text-danger" v-if="v$.form.password.$error">
                    {{ v$.form.password.$errors[0].$message }}
                </small>
            </div>
            <!-- Remember Me -->
            <div
                class="Forget-Remember d-flex justify-content-between mt-3 flex-wrap"
            >
                <!-- Remember -->
                <div class="Remember d-flex gap-1 align-items-center">
                    <label
                        class="d-flex align-items-center gap-1"
                        for="uniqueID"
                    >
                        <input
                            id="remember"
                            type="checkbox"
                            class="toggle__input"
                            name="remember"
                            v-model="state.form.remember"
                        />
                        <p class="mt-3">{{ $t("Remember Me") }}</p>
                    </label>
                </div>
                <!-- Forget Password -->

                <!-- Forget Password -->
                <div class="forget">
                    <div class="forget mt-3">
                        <a :href="ForgetUrl">{{ $t("Forget Password?") }}</a>
                    </div>
                </div>
            </div>
            <!-- Submit -->
            <div class="submit mt-3">
                <input type="submit" :value="$t('LOG IN')" />
                <!-- <v-btn type="submit">
                    {{ $t("LOG IN") }}
                </v-btn> -->
            </div>
            <!-- Have Account -->
            <div class="haveAccount text-center mt-2">
                <h6>
                    {{ $t("Haven't Account?") }}
                    <a :href="haveAccountUrl">{{ $t("RegisterEmail") }}</a>
                </h6>
            </div>
        </form>
    </div>
</template>
<script>
import axios from "axios";
import Cookies from "js-cookie";
import router from "../../router/index.js";
import state from "../../store/index.js";
import { mapActions, mapGetters } from "vuex";
import useValidate from "@vuelidate/core";
import { required, minLength } from "@vuelidate/validators";
import { computed, reactive } from "vue";
import { number } from "@intlify/core-base";
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

export default {
    name: "RegisterForm",
    data() {
        return {
            haveAccount: "Haven't Account?",
            haveAccountText: "Register",
            haveAccountUrl: "/Register",
            RememberTitle: "Remember Me",
            ForgetTitle: "Forget Password?",
            ForgetUrl: "/forgetpassword",
            vuePhone: {
                phone: "",
                props: {
                    clearable: true,
                    fetchCountry: true,
                    preferredCountries: ["EG", "SA"],
                    noExample: false,
                    translations: {
                        countrySelectorLabel: "Country code",
                        countrySelectorError: "Error",
                        phoneNumberLabel: "Enter your phone",
                        example: "Example:",
                    },
                },
            },
        };
    },
    setup() {
        const state = reactive({
            form: {
                phone: "",
                password: "",
                remember: false,
            },
        });
        const rules = computed(() => {
            return {
                form: {
                    phone: [required],
                    password: [required, minLength(8)],
                },
            };
        });
        const v$ = useValidate(rules, state)
        return { rules, state, v$ }
    },
    computed: {
        ...mapGetters({
            authenticated: "auth/authenticated",
        }),
    },
    methods: {
        ...mapActions({
            signIn: "auth/signIn",
        }),
        submitForm() {
            this.v$.$validate();
            if (!this.v$.$error) {
                let status = this.signIn(this.state.form);
                status.then(() => {
                    if (this.authenticated) {
                        this.$router.push("/");
                    }
                })
                if (this.authenticated) {
                    this.$router.push("/");
                }
            }
        },
        phoneInput(e) {
            this.state.form.phone = e.target.value;
            // string to number
            this.state.form.phone = +this.state.form.phone;
        },
    },
};
</script>

<style scoped>
input {
    height: 60px;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 10px;
    padding: 20px;
    background-color: #eee;
    border: 1px solid #bdbdbd;
    border-radius: 2px;
    outline: none;
}
input:focus,
textarea:focus {
    background-color: #fff;
    border: 1px solid var(--secondary-text-color);
}
.vue-tel-input {
    border-radius: 3px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    /* border: 1px solid #bbb; */
    text-align: left;
    height: 60px;
    box-shadow: rgb(0 0 0 / 10%) 0px 0px 10px;
    background-color: #eee;
    border: 1px solid #bdbdbd;
}
.submit {
    display: flex;
    justify-content: center;
}
input[type="submit"],
v-btn {
    padding: 10px;
    text-align: center;
    background-color: var(--secondary-text-color);
    border: none;
    color: #fff;
    width: 50%;
}
.haveAccount h6 {
    color: #707070;
}
.haveAccount h6 a {
    color: var(--secondary-text-color);
}
.forget a {
    color: var(--secondary-text-color);
    text-decoration: none;
}
.forget a:hover {
    text-decoration: underline;
}
svg {
    margin-bottom: 5px;
}
input[type="checkbox"] {
    accent-color: #212529;
    height: 20px;
    width: 20px;
}
input:invalid:not(input[type="submit"]) {
    border: 1px solid red;
    animation: shake 0.2s 2;
}
@media screen and (-ms-high-contrast: active) {
    .toggle-track {
        border-radius: 0;
    }
}
@media screen and (max-width: 450px) {
    .Forget-Remember {
        flex-wrap: wrap;
    }
}
@media screen and (max-width: 767px) {
    input {
        width: 100%;
        margin: 0;
    }
}
</style>
