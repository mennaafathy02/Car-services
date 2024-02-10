<template>
    <!-- new password and confirm with pin code -->
    <div class="resetPassword">
        <form
            action=""
            method=""
            class="d-flex flex-column gap-3"
            @submit.prevent="resetNewPassword"
        >
            <!-- code -->
            <div class="pin-code">
                <input
                    type="number"
                    name="pinCode"
                    :placeholder="$t('Pin Code')"
                    v-model="state.form.pin_code"
                />
                <small class="text-danger" v-if="v$.form.pin_code.$error">
                    {{ v$.form.pin_code.$errors[0].$message }}
                </small>
            </div>
            <!-- Password -->
            <div class="Password">
                <input
                    type="password"
                    name="Password"
                    :placeholder="$t('New Password')"
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
                    :placeholder="$t('Confirm New Password')"
                    v-model="state.form.password_confirmation"
                />
                <small
                    class="text-danger"
                    v-if="v$.form.password_confirmation.$error"
                >
                    {{ v$.form.password_confirmation.$errors[0].$message }}
                </small>
            </div>
            <!-- Submit -->
            <div class="submit mt-3">
                <input type="submit" :value="$t('Send')" />
            </div>
        </form>
    </div>
</template>

<script>
import useValidate from "@vuelidate/core";
import { required, sameAs, minLength } from "@vuelidate/validators";
import { computed, reactive } from "vue";
import axios from "axios";
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
// CommonJS
// const Swal = require('sweetalert2')

export default {
    name: "ResetPasswordForm",
    setup() {
        const state = reactive({
            form: {
                pin_code: "",
                password: "",
                password_confirmation: "",
            },
        });
        const rules = computed(() => {
            return {
                form: {
                    pin_code: [required],
                    password: [required, minLength(8)],
                    password_confirmation: [
                        required,
                        sameAs(state.form.password),
                    ],
                },
            };
        });

        const v$ = useValidate(rules, state);
        return {
            state,
            rules,
            v$,
        };
    },
    methods: {
        async resetNewPassword() {
            this.v$.$validate();
            if (this.v$.$error) {
                return;
            }
            await axios.post(
                "/api/reset-password", {
                    pin_code: this.state.form.pin_code,
                    password: this.state.form.password,
                    password_confirmation: this.state.form.password_confirmation,
                }
            ).then((res) => {
                if (res.status == 200) {
                    Swal.fire({
                        icon:'success',
                        title: 'Success',
                        text: 'Password has been reset successfully',
                    });
                    this.$router.push("/login");
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong',
                });
            })
        },
    },
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
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type="number"] {
    -moz-appearance: textfield;
}
@media screen and (max-width: 767px) {
    input {
        width: 100%;
        margin: 0;
    }
}
</style>
