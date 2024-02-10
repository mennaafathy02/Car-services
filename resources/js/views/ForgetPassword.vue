<template>
    <Preloader ref="preloader"/>
    <div
        class="ForgetPassword d-flex flex-column m-auto mb-5 justify-content-center"
    >
        <!-- Icon -->
        <div class="icon d-flex justify-content-center">
            <lord-icon
                src="https://cdn.lordicon.com/pdpnqfoe.json"
                trigger="loop"
                delay="2000"
                colors="primary:#c3984f,secondary:#ebe6ef"
                style="width: 200px; height: 200px"
            >
            </lord-icon>
        </div>
        <!-- Title -->
        <div class="title mb-3 text-center">
            <h3>{{ $t('Reset Password') }}</h3>
        </div>
        <!-- Reset Password -->
        <ForgetPasswordForm />
    </div>
</template>

<script>
import ForgetPasswordForm from "../components/forget-password/ForgetPasswordForm.vue";
import Preloader from "../components/Preloader.vue";

export default {
    name: "ForgetPassword",
    data() {
        return {
            title: "Reset Password",
        };
    },
    components: {
        ForgetPasswordForm,
        Preloader,
    },
    mounted() {
         this.$store.dispatch('auth/SET_TimeLoaded', 1000);
        this.$refs.preloader.showPreloader;
    },
};
</script>

<style scoped>
.ForgetPassword {
    width: 40%;
    margin-top: 150px !important;
    background-color: #fff;
    padding: 30px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
    border-radius: 5px;
    height: calc(100vh - 305px);
}

h3{
    font-weight: 600;
    color: var(--secondary-text-color);
}

.title {
    margin-top: -20px;
}

@media screen and (max-width: 767px) {
    .ForgetPassword {
        width: 90%;
    }
}

@media screen and (min-width: 768px) and (max-width: 1000px) {
    .ForgetPassword {
        width: 70%;
    }
}
</style>
