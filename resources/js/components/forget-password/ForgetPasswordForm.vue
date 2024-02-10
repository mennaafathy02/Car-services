<template>
    <form
        action=""
        method=""
        class="d-flex flex-column gap-3"
        @submit.prevent="resetPassword"
    >
        <!-- Email -->
        <div class="Email">
            <input
                type="email"
                name="email"
                :placeholder="$t('Your Email')"
                autofocus
                v-model="state.form.email"
            />
            <small class="text-danger" v-if="v$.form.email.$error">
                {{ v$.form.email.$errors[0].$message }}
            </small>
        </div>
        <!-- Submit -->
        <div class="submit mt-3">
            <input type="submit" :value="$t('Send')" />
        </div>
    </form>
</template>

<script>
import useValidate from "@vuelidate/core";
import { required, email} from "@vuelidate/validators";
import { computed, reactive } from "vue";
import axios from 'axios';
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
// CommonJS
// const Swal = require('sweetalert2')

export default {
    name: "ForgetPasswordForm",
    setup() {
        const state = reactive({
            form:{
                email: "",
            }
        });
        const rules = computed(() => {
            return {
                form:{
                    email: [required, email],
                }
            };
        });

        const v$ = useValidate(rules, state);
        return {
            state,
            rules,
            v$,
        };
    },
    methods:{
        async resetPassword() {
            this.v$.$validate();
            if (!this.v$.$error) {
                await axios
                    .post(`/api/send-email-password/${this.state.form.email}`, {
                        email: this.state.form.email,
                    })
                    .then((res) => {
                        if (res.status == 200) {
                            this.$router.push("/resetPassword");
                        }
                    })
                    .catch(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong',
                        });
                    })
            }
        },
    }
};
</script>

<style scoped>
input {
    height: 60px;
    width: 96%;
    margin-left: 2%;
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

.submit {
    display: flex;
    justify-content: center;
}

input[type="submit"] {
    background-color: var(--secondary-text-color);
    border: none;
    color: #fff;
    width: 50%;
    margin: auto;
}

@media screen and (max-width: 767px) {
    input {
        width: 100%;
        margin: 0;
    }
}
</style>
