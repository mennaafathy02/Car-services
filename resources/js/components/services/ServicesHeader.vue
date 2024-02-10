<template>
    <div
        class="d-flex justify-content-center align-items-center services-header mt-5"
    >
        <HeaderSec :title="$t('OUR SERVICES')"></HeaderSec>
    </div>
</template>
<script>
import HeaderSec from "./HeaderSec.vue";
export default {
    name: "ServicesHeader",
    data() {
        return {};
    },
    components: {
        HeaderSec,
    },
};
</script>

<style scoped>
.services-header {
    height: 40vh;
    background-size: cover;
    background-position-x: center;
    background-image: url(../../images/services/bg-breadcrumbs-detail.jpg);
}
.HeaderSec h2 {
    color: var(--background-color);
}
</style>
