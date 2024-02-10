<template>
    <Preloader ref="preloader"/>
    <div class="Register d-flex flex-column m-auto mb-5">
        <!-- Icon -->
        <div class="icon d-flex justify-content-center">
            <lord-icon
                src="https://cdn.lordicon.com/ajkxzzfb.json"
                trigger="loop"
                delay="2000"
                colors="primary:#ffc738,secondary:#c3984f"
                style="width: 200px; height: 200px"
            >
            </lord-icon>
        </div>
        <!-- Title -->
        <div class="title mb-3 text-center">
            <h2>{{ $t('Create Account') }}</h2>
        </div>
        <!-- Form For Register -->
        <RegisterForm />
    </div>
</template>

<script>
import RegisterForm from "../components/register/RegisterForm.vue";
import Preloader from "../components/Preloader.vue";
export default {
    components: {
        RegisterForm,
        Preloader,
    },
    name: "Register",
    data() {
        return {
            title: "Create Account",
        };
    },
    mounted() {
        this.$store.dispatch('auth/SET_TimeLoaded', 1000);
        this.$refs.preloader.showPreloader;
    }
};
</script>

<style scoped>
.Register {
    width: 40%;
    margin-top: 150px !important;
    background-color: #fff;
    padding: 30px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
    border-radius: 5px;
}
h2 {
    font-weight: 600;
    color: var(--secondary-text-color);
}
.title {
    margin-top: -20px;
}
@media screen and (max-width: 767px) {
    .Register {
        width: 90%;
    }
}
@media screen and (min-width: 768px) and (max-width: 1000px) {
    .Register {
        width: 70%;
    }
}
</style>
