<template>
    <Preloader ref="preloader"/>
    <div class="LogIn d-flex flex-column m-auto mb-5">
        <!-- Icon -->
        <div class="icon d-flex justify-content-center">
            <lord-icon
                src="https://cdn.lordicon.com/ugbgnnqc.json"
                trigger="loop"
                delay="2000"
                colors="primary:#c3984f,secondary:#faefd1"
                style="width: 200px; height: 200px"
            >
            </lord-icon>
        </div>
        <!-- Title -->
        <div class="title mb-3 mt-1 text-center">
            <h2>{{ $t('LOG IN').toUpperCase() }}</h2>
        </div>
        <!-- Form For Register -->
        <LogInForm />
    </div>
</template>

<script>
import LogInForm from "../components/login/LogInForm.vue";
import Preloader from "../components/Preloader.vue";

export default {
    name: "LogIn",
    data() {
        return {
            title: "Log In",
        };
    },
    components: {
        LogInForm,
        Preloader,
    },
    mounted() {
        this.$store.dispatch('auth/SET_TimeLoaded', 1000);
        this.$refs.preloader.showPreloader;
    }
};
</script>

<style scoped>
.LogIn {
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
    .LogIn {
        width: 90%;
    }
}

@media screen and (min-width: 768px) and (max-width: 1000px) {
    .LogIn {
        width: 70%;
    }
}
</style>
