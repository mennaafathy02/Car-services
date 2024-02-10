<template>
    <div class="ContactForm m-auto mt-5 mb-5">
        <form action="" method="" @submit.prevent="onSubmit">
            <!-- Name + Email + Subject -->
            <div class="name-email-subject d-flex flex-column gap-3">
                <!-- Name -->
                <div class="text">
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
                <div class="email">
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
                <!-- Subject -->
                <div class="subject">
                    <input
                        type="text"
                        name="Subject"
                        :placeholder="$t('Subject')"
                        v-model="state.form.subject"
                    />
                    <small class="text-danger" v-if="v$.form.subject.$error">
                        {{ v$.form.subject.$errors[0].$message }}
                    </small>
                </div>
            </div>
            <!-- textarea -->
            <div class="textArea d-flex flex-column gap-3">
                <!-- Msg -->
                <textarea
                    name="Msg"
                    :placeholder="$t('Your Message (optional)')"
                    rows="7"
                    v-model="state.form.message"
                ></textarea>
            </div>
            <!-- Submit -->
            <div class="submit mt-4 d-flex">
                <input type="submit" :value="$t('Send Message')" class="btn" />
            </div>
        </form>
    </div>
</template>

<script>
import useValidate from "@vuelidate/core";
import { required, email, minLength } from "@vuelidate/validators";
import { computed, reactive } from "vue";
import axios from 'axios';
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'


export default {
    name: "ContactForm",
    setup() {
        const state = reactive({
            form: {
                name: "",
                email: "",
                subject: "",
                message: "",
            }
        });
        const rules = computed(() => {
            return {
                form:{
                    name: [required, minLength(3)],
                    email: [required, email],
                    subject: "",
                    message: "",
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
    methods: {
        async onSubmit() {
            this.v$.$validate();
            if (!this.v$.$error) {
                await axios.post('/api/contact-us', {
                    name: this.state.form.name,
                    email: this.state.form.email,
                    subject: this.state.form.subject,
                    message: this.state.form.message,
                })
                .then((res) => {
                    if (res.status == 200) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your message was sent successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                })
                .then(() => {
                    this.state.form.name = "";
                    this.state.form.email = "";
                    this.state.form.subject = "";
                    this.state.form.message = "";
                    this.$router.push("/contactus");
                })
                .catch(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please send the message again',
                    });
                })
            }
        }
    }
};
</script>

<style scoped>
.ContactForm {
    width: 70%;
}
.ContactForm form {
    display: grid;
    grid-template-columns: repeat(2, 48%);
    justify-content: space-between;
}
input {
    height: 60px;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
    padding: 10px;
    background-color: #eee;
    border: 1px solid #bdbdbd;
    outline: none;
}
input:focus,
textarea:focus {
    background-color: #fff;
    border:1px solid var(--secondary-text-color);
}
p {
    color: #707070;
}
textarea {
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
    padding: 20px;
    background-color: #eee;
    border: 1px solid #bdbdbd;
    outline: none;
}
input[type="submit"] {
    background-color: var(--secondary-text-color);
    border: none;
    color: #fff;
    width: 50%;
}
.submit {
    grid-column: 2;
    justify-content: end;
}
input:invalid:not(input[type="submit"]) {
    border: 1px solid red;
    animation: shake 0.2s 2;
}
@keyframes shake {
    25% {
        translate: 2px 0;
    }
    50% {
        translate: -2px 0;
    }
    75% {
        translate: 2px 0;
    }
}
@media screen and (max-width: 767px) {
    .ContactForm {
        width: 90%;
    }
    .ContactForm form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .submit {
        justify-content: center;
    }
}
@media screen and (min-width: 768px) and (max-width: 1022px) {
    .ContactForm {
        width: 85%;
    }
}
@media screen and (min-width: 1023px) and (max-width: 1200px) {
    .ContactForm {
        width: 90%;
    }
}
</style>
