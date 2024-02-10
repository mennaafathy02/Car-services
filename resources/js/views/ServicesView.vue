<template>
    <Preloader ref="preloader"/>
    <ServicesHeader />
    <Booked />
    <HowitWorks />
    <CallUs class="reveal" />
</template>

<script>
import ServicesHeader from "../components/services/ServicesHeader.vue";
import HowitWorks from "../components/services/HowitWorks.vue";
import CallUs from "../components/services/CallUs.vue";
import Booked from "../components/services/Booked.vue";
import Preloader from "../components/Preloader.vue";
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
export default {
    name: "Services",
    components: {
        ServicesHeader,
        HowitWorks,
        Booked,
        CallUs,
        Preloader
    },
    computed:{
        ...mapGetters({
            timeLoaded: "auth/timeLoaded",
        }),
    },
    methods: {
        ...mapActions({
            SET_TimeLoaded: 'auth/SET_TimeLoaded',
        }),
    },
    async mounted() {
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;
                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }
        window.addEventListener("scroll", reveal);
        this.$store.dispatch("auth/SET_TimeLoaded", this.timeLoaded);
        this.$refs.preloader.showPreloader;
    },
};
</script>
