<template>
    <Preloader ref="preloader"/>
    <div class="ResetPassword d-flex flex-column m-auto mb-5 justify-content-center">
         <!-- Icon -->
            <div class="icon d-flex justify-content-center">
                <lord-icon
                    src="https://cdn.lordicon.com/hbvgknxo.json"
                    trigger="hover"
                    colors="primary:#faefd1,secondary:#c3984f,tertiary:#3a3347"
                    style="width:200px;height:200px">
                </lord-icon>
            </div>
            <!-- Title -->
            <div class="title mb-4 text-center">
                <h3>{{ $t('Reset Password') }}</h3>
            </div>
            <!-- new password and confirm with pin code -->
            <ResetPasswordForm />
    </div>
</template>

<script>
import ResetPasswordForm from '../components/forget-password/ResetPasswordForm.vue';
import Preloader from '../components/Preloader.vue';

export default {
    name: "ResetPassword",
    components: {
        ResetPasswordForm,
        Preloader,
    },
    mounted() {
        this.$store.dispatch('auth/SET_TimeLoaded', 1000);
        this.$refs.preloader.showPreloader;
    }
}

</script>

<style scoped>
.ResetPassword {
    width: 40%;
    margin-top: 150px !important;
    background-color: #fff;
    padding: 30px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
    border-radius: 5px;
}

h3 {
    font-weight: 600;
    color: var(--secondary-text-color);
}

.title {
    margin-top: -40px;
}

@media screen and (max-width: 767px) {
    .ResetPassword {
        width: 90%;
    }
}

@media screen and (min-width: 768px) and (max-width: 1000px) {
    .ResetPassword {
        width: 70%;
    }
}
</style>
