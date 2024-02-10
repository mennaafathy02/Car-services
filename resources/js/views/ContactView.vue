<template>
    <Preloader ref="preloader"/>
    <div class="ContactPage">
        <!-- <Preloader /> -->
        <!-- title -->
        <ContactTitle />
        <!-- Information To Contact -->
        <ContactInfo />
        <!-- Form To Send Msg -->
        <ContactForm />
    </div>
</template>

<script>
import ContactTitle from "../components/contact/ContactTitle.vue";
import ContactInfo from "../components/contact/ContactInfo.vue";
import ContactForm from "../components/contact/ContactForm.vue";
import Preloader from "../components/Preloader.vue";

export default {
    name: "ContactView",
    components: {
        ContactTitle,
        ContactInfo,
        ContactForm,
        Preloader
    },
    mounted() {
        this.$store.dispatch('auth/SET_TimeLoaded', 1000);
        this.$refs.preloader.showPreloader;
    }
};
</script>
