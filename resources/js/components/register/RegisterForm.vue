<template>
    <div class="RegisterForm">
        <form
            action=""
            method=""
            class="d-flex flex-column gap-3"
            @submit.prevent="submitForm"
        >
            <!-- Radio -->
            <div class="radio d-flex justify-content-center gap-3">
                <label class="d-flex align-items-center gap-1">
                    <input
                        type="radio"
                        name="type"
                        value="machine"
                        v-model="state.form.type"
                        @click="showSkills"
                    />
                    <span>{{ $t("machine") }}</span>
                </label>
                <label class="d-flex align-items-center gap-1">
                    <input
                        type="radio"
                        name="type"
                        value="customer"
                        v-model="state.form.type"
                        @click="noSkills"
                    />
                    <span>{{ $t("customer") }}</span>
                </label>
                <small class="text-danger" v-if="v$.form.type.$error">
                    {{ v$.form.type.$errors[0].$message }}
                </small>
            </div>
            <!-- name -->
            <div class="name">
                <input
                    type="text"
                    name="text"
                    :placeholder="$t('Your Name')"
                    v-model="state.form.name"
                />
                <small class="text-danger" v-if="v$.form.name.$error">
                    {{ v$.form.name.$errors[0].$message }}
                </small>
            </div>
            <!-- Email -->
            <div class="Email">
                <input
                    type="email"
                    name="email"
                    :placeholder="$t('Your Email')"
                    v-model="state.form.email"
                />
                <small class="text-danger" v-if="v$.form.email.$error">
                    {{ v$.form.email.$errors[0].$message }}
                </small>
            </div>
            <!-- Phone -->
            <div class="Phone">
                <input type="text" v-model="state.form.phone" class="phoneNumber" :placeholder="$t('Your Phone')" @change="phoneInput">
                <small class="text-danger" v-if="v$.form.phone.$error">
                    {{ v$.form.phone.$errors[0].$message }}
                </small>
            </div>
            <!-- Password -->
            <div class="Password">
                <input
                    type="password"
                    name="Password"
                    :placeholder="$t('Password')"
                    v-model="state.form.password"
                />
                <small class="text-danger" v-if="v$.form.password.$error">
                    {{ v$.form.password.$errors[0].$message }}
                </small>
            </div>
            <!-- PasswordConfirm -->
            <div class="PasswordConfirm">
                <input
                    type="password"
                    name="PasswordConfirm"
                    :placeholder="$t('Password Confirm')"
                    v-model="state.form.password_confirmation"
                />
                <small
                    class="text-danger"
                    v-if="v$.form.password_confirmation.$error"
                >
                    {{ v$.form.password_confirmation.$errors[0].$message }}
                </small>
            </div>
            <!-- Skills -->
            <div class="skill" v-show="state.show">
                <textarea rows="10" :placeholder="$t('Your skills')" v-model="state.form.skills"></textarea>
                <small class="text-danger" v-if="v$.form.skills.$error">
                    {{ v$.form.skills.$errors[0].$message }}
                </small>
            </div>
            <!-- Submit -->
            <div class="submit mt-3">
                <input type="submit" :value="$t('Create Now')" />
            </div>
            <!-- Have Account -->
            <div class="haveAccount text-center mt-2">
                <h6>
                    {{ $t("Have Account?") }}
                    <a :href="haveAccountUrl">{{ $t("Log in") }}</a>
                </h6>
            </div>
        </form>
    </div>
</template>
<script>
import useValidate from "@vuelidate/core";
import { required, email, minLength, sameAs } from "@vuelidate/validators";
import { computed, reactive } from "vue";
import Cookies from "js-cookie";
import axios from "axios";
import { mapActions, mapGetters } from "vuex";
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

export default {
    name: "RegisterForm",
    data() {
        return {
            haveAccount: "Have Account?",
            haveAccountText: "Log in",
            haveAccountUrl: "/login",
        }
    }
    ,
    setup() {
        const state = reactive({
            form: {
                name: "",
                email: "",
                phone: "",
                skills:"",
                type: "machine",
                password: "",
                password_confirmation: "",
            },
            show: true,
            vuePhone: {
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
        });
        const rules = computed(() => {
            return {
                form: {
                    name: [required, minLength(3)],
                    email: [required, email],
                    phone: [required],
                    type: [required],
                    skills: [required],
                    password: [required, minLength(8)],
                    password_confirmation: [
                        required,
                        sameAs(state.form.password),
                    ],
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
            register : "auth/register"
        }),
        submitForm() {
            this.v$.$validate();
            if(!this.v$.$error){
                this.register(this.state.form);
                this.$router.push("/");
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
        noSkills() {
            this.state.show = false
            this.state.form.skills = "No skills"
        },
        showSkills() {
            this.state.show = true
            this.state.form.skills = this.state.form.skills
        }
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

.vue-tel-input {
    border-radius: 3px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    text-align: left;
    height: 60px;
    box-shadow: rgb(0 0 0 / 10%) 0px 0px 10px;
    background-color: #eee;
    border: 1px solid #bdbdbd;
}

input:focus,
textarea:focus {
    background-color: #fff;
    border: 1px solid var(--secondary-text-color);
}

.submit {
    display: flex;
    justify-content: center;
}

input[type="submit"] {
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

.radio input[type="radio"] {
    accent-color: #212529;
    height: 20px;
    width: 20px;
    cursor: pointer;
}

input:invalid:not(input[type="submit"]) {
    border: 1px solid red;
    animation: shake 0.2s 2;
}
textarea{
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 10px;
    padding: 20px;
    background-color: #eee;
    border: 1px solid #bdbdbd;
    border-radius: 2px;
    outline: none;
    width:100%;
}
@media screen and (max-width: 767px) {
    input {
        width: 100%;
        margin: 0;
    }
}
</style>
