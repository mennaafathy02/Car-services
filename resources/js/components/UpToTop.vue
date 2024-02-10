<template>
    <button
        @click="backToTop"
        type="button"
        class="btn btn-floating btn-lg"
        id="btn-back-to-top"
    >
        <span>&#8593;</span>
    </button>
</template>

<script>
export default {
    name: "UpToTop",
    mounted() {
        window.addEventListener("scroll", this.handleScroll);
    },
    methods: {
        handleScroll() {
            let btn = document.getElementById("btn-back-to-top");
            if (window.pageYOffset > 300) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
        },
        backToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
    },
};
</script>

<style scoped>
#btn-back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: var(--secondary-text-color);
    padding: 8px 20px 10px 20px;
    color: #fff;
    z-index: 999;
    display: none;
}
</style>
