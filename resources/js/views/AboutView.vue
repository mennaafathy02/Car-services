<template>
    <preloader ref="preloader"/>
    <div class="about-page d-flex gap-5 flex-column mt-5 m-auto">
        <!-- <Preloader /> -->
        <!-- Title -->
        <TitleAboutPage title="About Us" />
        <WhoAreAboutPage />
        <!-- <HearAbout class="reveal" /> -->
        <HowItWork class="reveal" />
    </div>
</template>

<script>
import TitleAboutPage from "../components/about/TitleAboutPage.vue";
import WhoAreAboutPage from "../components/about/WhoAreAboutPage.vue";
// import HearAbout from "../components/about/HearAbout.vue";
import HowItWork from "../components/about/HowItWork.vue";
import Preloader from "../components/Preloader.vue";
export default {
    name: "AboutView",
    title: "ABOUT US",
    components: {
        TitleAboutPage,
        WhoAreAboutPage,
        HowItWork,
        Preloader
    },
    mounted() {
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
        this.$store.dispatch('auth/SET_TimeLoaded', 1000);
        this.$refs.preloader.showPreloader;
    }
};
</script>
