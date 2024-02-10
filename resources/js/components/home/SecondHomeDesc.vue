<template>
    <div class="d-flex gap-3">
        <!-- Icon -->
        <div class="icon">
            <span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    fill="currentColor"
                    :class="icon"
                    viewBox="0 0 16 16"
                >
                    <path :d="d1" />
                    <path :d="d2" />
                </svg>
            </span>
        </div>
        <!-- Title + Description -->
        <div class="title">
            <h3>{{ titleDesc }}</h3>
            <p>{{ paragrapghDes }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "SecondHomeDesc",
    props: ["titleDesc", "paragrapghDes", "icon", "d1", "d2"],
};
</script>

<style scoped>
h3 {
    font-weight: 600;
    color: var(--primary-text-color);
}
p {
    color: #707070;
}
svg {
    color: var(--secondary-text-color);
}
</style>
