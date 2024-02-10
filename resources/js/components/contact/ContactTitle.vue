<template>
    <div class="contactTitle">
        <!-- Overlay -->
        <div class="background-overlay"></div>
        <h1>{{ $t("Contact Us").toUpperCase() }}</h1>
    </div>
</template>

<script>
export default {
    name: "ContactTitle",
    data() {
        return {
            title: "Contact Us",
        };
    },
};
</script>

<style scoped>
.contactTitle {
    background-image: url(../../images/about/bg-about.jpg);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    height: 100%;
    color: var(--background-color);
    backdrop-filter: brightness(60%);
    padding: 150px;
    position: relative;
    margin-top: 100px;
}

.contactTitle .background-overlay {
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

.contactTitle h1 {
    text-align: center;
    font-weight: 600;
    font-size: 40px;
}

@media screen and (max-width: 767px) {
    .contactTitle h1 {
        font-size: 25px;
    }

    .contactTitle {
        padding: 80px;
    }
}
</style>
