<template>
    <div
        class="d-flex flex-column justify-content-center align-items-center call-us mb-5"
    >
        <HeaderSec :title="$t('IT\'S What WE DO')"></HeaderSec>
        <h5 class="px-3 text-center my-3">
            {{ $t("We'll make your car feel brand new visit our") }}
        </h5>
    </div>
</template>

<script>
import HeaderSec from "./HeaderSec.vue";
export default {
    name: "CallUs",
    data() {
        return {};
    },
    components: {
        HeaderSec,
    },
};
</script>

<style scoped>
.call-us {
    color: var(--background-color);
    height: 40vh;
    background-size: cover;
    background-position-x: center;
    background-image: url(../../images/services/callus.jpg);
}
.btn {
    background-color: var(--secondary-text-color);
    border: none;
}
.btn:hover {
    background-color: var(--secondary-text-color);
}
.btn a {
    text-decoration: none;
    color: var(--background-color) !important;
}
</style>
