<template>
    <div class="FourHome m-auto mb-5">
        <!-- Title -->
        <div class="title mt-5 mb-5">
            <h2>{{ $t('What our Clients say!') }}</h2>
        </div>
        <!-- Comments -->
        <div class="parentFourHome">
            <FourHomeDesc />
        </div>
    </div>
</template>

<script>
import FourHomeDesc from './FourHomeDesc.vue';
export default {
    components: { FourHomeDesc },
    name: "FourHome",
    data() {
        return {
            title: "What our Clients say!",
        };
    },
};
</script>

<style scoped>
.FourHome {
    width: 70%;
}
.FourHome .title h2 {
    text-align: center;
    font-size: 40px;
    position: relative;
}
.FourHome .title h2::before {
    content: "";
    position: absolute;
    bottom: -20px;
    left: 40%;
    width: 20%;
    background-color: #000;
    height: 3px;
}
.parentFourHome {
    display: grid;
    /* grid-template-columns: repeat(3, 30%); */
    grid-template-columns: repeat(auto-fit,minmax(300px,1fr)) !important;
    grid-gap:20px;
    /* justify-content: space-between; */
}
@media screen and (max-width: 767px) {
    .FourHome {
        width: 80%;
    }
    .parentFourHome {
        grid-template-columns: repeat(1, 100%);
        grid-gap: 30px;
    }
}
</style>
