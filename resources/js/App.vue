<template>
    <Header />
    <RouterView />
    <UpToTop />
    <Footer />
</template>
<script setup>
import { RouterLink, RouterView } from "vue-router";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import UpToTop from "./components/UpToTop.vue";
import HomeView from "./views/HomeView.vue";
</script>
