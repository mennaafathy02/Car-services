<template>
    <Preloader ref="preloader" />
    <div class="home-page d-flex gap-5 flex-column">
        <FirstHome />
        <SecondHome class="reveal" />
        <ThirdHome class="reveal" />
        <FourHome class="reveal"/>
    </div>
</template>

<script>
import FirstHome from "../components/home/FirstHome.vue";
import SecondHome from "../components/home/SecondHome.vue";
import ThirdHome from "../components/home/ThirdHome.vue";
import FourHome from "../components/home/FourHome.vue";
import Preloader from "../components/Preloader.vue";
export default {
    name: "Home",
    components: {
        FirstHome,
        SecondHome,
        ThirdHome,
        FourHome,
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
        this.$refs.preloader.showPreloader;
    }
};
</script>
