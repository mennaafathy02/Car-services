<template>
    <div class="d-flex gap-3">
        <!-- Icon -->
        <div class="icon">
            <span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="30"
                    height="35"
                    fill="currentColor"
                    :class="icon"
                    viewBox="0 0 16 16"
                >
                    <path :d="d1" />
                    <path :d="d2" />
                    <path :d="d3" />
                </svg>
            </span>
        </div>
        <!-- Text -->
        <div class="text">
            <h5>{{ title }}</h5>
            <p>{{ paragraph }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "FirstHomeDesc",
    props: ["icon", "d1", "d2", "d3", "title", "paragraph"],
};
</script>

<style scoped>
.firstHome .content .icon span {
    background-color: var(--background-color);
    padding: 20px 15px;
    border-radius: 50%;
}
.firstHome .content .icon svg {
    fill: var(--secondary-text-color);
}
</style>
