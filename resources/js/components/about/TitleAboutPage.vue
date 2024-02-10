<template>
    <div class="TitleAboutPage mt-5">
        <!-- Overlay -->
        <div class="background-overlay"></div>
        <h1>{{ $t('ABOUT US') }}</h1>
    </div>
</template>

<script>
export default {
    name: "TitleAboutPage",
    props: ["title"],

};
</script>

<style scoped>
.TitleAboutPage {
    background-image: url(../../images/about/bg-about.jpg);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    height: 100%;
    color: var(--background-color);
    backdrop-filter: brightness(60%);
    padding: 150px;
    position: relative;
}
.TitleAboutPage .background-overlay {
    position: absolute;
    background-color: #282828;
    opacity: 0.5;
    z-index: -2;
    width: 100%;
    top: 0;
    left: 0;
    height: 100%;
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
}
.TitleAboutPage h1 {
    text-align: center;
    font-weight: 600;
    font-size: 40px;
}
@media screen and (max-width: 767px) {
    .TitleAboutPage h1 {
        font-size: 25px;
    }
    .TitleAboutPage {
        padding: 80px;
    }
}
</style>
